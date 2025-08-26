<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;
use Stripe\Subscription as StripeSubscription;
use App\Models\Tenant;
use App\Models\Subscription as SubModel;

class StripeWebhookController extends Controller
{
public function handle(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        Log::info('Stripe Webhook Event: ' . $event->type);

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                // Save stripe_customer_id in Tenant
                $tenantId = $session->metadata->user_id ?? null;
                if ($tenantId) {
                    $tenant = Tenant::find($tenantId);
                    if ($tenant) {
                        $tenant->stripe_customer_id = $session->customer;
                        $tenant->save();
                    }
                }

                // If it's a subscription checkout, store subscription
                if (!empty($session->subscription)) {
                    $subscription = StripeSubscription::retrieve($session->subscription);
                    $this->storeOrUpdateSubscriptionData($subscription);
                }
                break;

            case 'invoice.payment_succeeded':
                $invoice = $event->data->object;
                if (!empty($invoice->subscription)) {
                    $subscription = StripeSubscription::retrieve($invoice->subscription);
                    $this->storeOrUpdateSubscriptionData($subscription);
                }
                break;

            case 'customer.subscription.created':
            case 'customer.subscription.updated':
            case 'customer.subscription.deleted':
                $subscription = $event->data->object; // already a Subscription object
                $this->storeOrUpdateSubscriptionData($subscription);
                break;

            default:
                // Optional: log other events for later
                Log::info("Unhandled event type: " . $event->type);
        }

        return response()->json(['received' => true]);
    }

    protected function storeOrUpdateSubscriptionData($stripeSub)
    {
        Log::info('Processing subscription: ' . $stripeSub->id);

        $stripeCustomerId = $stripeSub->customer ?? null;
        $stripeSubId = $stripeSub->id ?? null;
        $status = $stripeSub->status ?? null;
        $current_period_end = !empty($stripeSub->current_period_end)
            ? date('Y-m-d H:i:s', $stripeSub->current_period_end)
            : null;
        $priceId = $stripeSub->items->data[0]->price->id ?? null;

        if (!$stripeCustomerId) {
            Log::warning("Subscription {$stripeSubId} has no customer ID");
            return;
        }

        // Find the Tenant using stripe_customer_id
        $tenant = Tenant::where('stripe_customer_id', $stripeCustomerId)->first();

        if ($tenant) {
            SubModel::updateOrCreate(
                ['stripe_id' => $stripeSubId],
                [
                    'tenant_id' => $tenant->id,
                    'stripe_price_id' => $priceId,
                    'status' => $status,
                    'current_period_end' => $current_period_end,
                ]
            );
            Log::info("Subscription saved/updated for tenant {$tenant->id}");
        } else {
            Log::warning("No Tenant found with stripe_customer_id: {$stripeCustomerId}");
        }
    }
}
