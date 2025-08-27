<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Subscription as StripeSubscription;
use App\Models\Subscription as SubModel;

class SubscriptionController extends Controller
{
    public function cancel(Request $request)
    {
        
        $sub = SubModel::where('tenant', $request->tenant_id)
                       ->whereIn('status', ['active','trialing'])
                       ->latest()->first();

        if (!$sub) return response()->json(['error' => 'No active subscription'], 404);

        Stripe::setApiKey(config('services.stripe.secret'));

        $updated = StripeSubscription::update($sub->stripe_id, [
            'cancel_at_period_end' => true,
        ]);

        $sub->status = $updated->status;
        $sub->save();

        return response()->json(['status' => 'cancellation_scheduled']);
    }

    public function swap(Request $request)
    {
        $request->validate(['priceId' => 'required|string']);
        $user = $request->user();
        $sub = SubModel::where('user_id', $user->id)
                       ->whereIn('status', ['active','trialing'])
                       ->latest()->first();

        if (!$sub) return response()->json(['error' => 'No active subscription'], 404);

        Stripe::setApiKey(config('services.stripe.secret'));
        $stripeSub = StripeSubscription::retrieve($sub->stripe_id);

        $itemId = $stripeSub->items->data[0]->id ?? null;
        if (!$itemId) return response()->json(['error' => 'No subscription item found'], 400);

        $updated = StripeSubscription::update($sub->stripe_id, [
            'items' => [
                ['id' => $itemId, 'price' => $request->priceId],
            ],
            // optional: 'proration_behavior' => 'create_prorations'
        ]);

        $sub->stripe_price_id = $request->priceId;
        $sub->status = $updated->status;
        $sub->current_period_end = isset($updated->current_period_end) ? date('Y-m-d H:i:s', $updated->current_period_end) : $sub->current_period_end;
        $sub->save();

        return response()->json(['status' => 'swapped']);
    }
}
