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

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $userId = $session->metadata->user_id ?? null;
                if ($userId) {
                    $user = Tenant::find($userId);
                    if ($user) {
                        $user->stripe_customer_id = $session->customer;
                        $user->save();
                        if (!empty($session->subscription)) {
                            $this->storeOrUpdateSubscriptionData(StripeSubscription::retrieve($session->subscription));
                        }
                    }
                }
                break;

            case 'invoice.payment_succeeded':
                $invoice = $event->data->object;
                if (!empty($invoice->subscription)) {
                    $this->storeOrUpdateSubscriptionData(StripeSubscription::retrieve($invoice->subscription));
                }
                break;

            case 'customer.subscription.created':
            case 'customer.subscription.updated':
            case 'customer.subscription.deleted':
                $subObj = $event->data->object;
                $this->storeOrUpdateSubscriptionData($subObj);
                break;

            default:
                // ignore other events or log them for later
        }

        return response()->json(['received' => true]);
    }

    protected function storeOrUpdateSubscriptionData($stripeSub)
    {
        $stripeCustomerId = $stripeSub->customer;
        $stripeSubId = $stripeSub->id;
        $status = $stripeSub->status;
        $current_period_end = $stripeSub->current_period_end ? date('Y-m-d H:i:s', $stripeSub->current_period_end) : null;
        $priceId = $stripeSub->items->data[0]->price->id ?? null;

        $user = null;
        if ($stripeCustomerId) {
            $user = \App\Models\Tenant::where('stripe_customer_id', $stripeCustomerId)->first();
        }

        if ($user) {
            \App\Models\Subscription::updateOrCreate(
                ['stripe_id' => $stripeSubId],
                [
                    'tenant_id' => $user->tenant_id,
                    'stripe_price_id' => $priceId,
                    'status' => $status,
                    'current_period_end' => $current_period_end,
                ]
            );
        } else {
            // Optionally log unmatched subscription for inspection
        }
    }
}
