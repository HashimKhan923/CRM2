<?php
namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeCheckoutController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(['priceId' => 'required|string']);

        Stripe::setApiKey(config('services.stripe.secret'));
        $user = $request->user();

        $session = Session::create([
            'mode' => 'subscription',
            'line_items' => [
                ['price' => $request->priceId, 'quantity' => 1],
            ],
            'customer_email' => $user->email,
            'success_url' => config('app.url') . '/billing/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => config('app.url') . '/billing/cancel',
            'metadata' => [
                'user_id' => $user->id,
            ],
        ]);

        return response()->json(['url' => $session->url]);
    }
}