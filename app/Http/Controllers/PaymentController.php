<?php

namespace App\Http\Controllers;

use App\Helpers\Res;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'rental_id' => 'required'
        ]);

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'payment_method' => 'pm_card_visa',
                'payment_method_types' => ['card'],
                'confirm' => true,
            ]);

            Payment::create([
                'amount' => $request->amount,
                'user_id' => $request->user()->id,
                'rental_id' => $request->rental_id
            ]);

            return Res::success($paymentIntent, 'Payment Successful');
        } catch (\Exception $e) {
            return Res::error($e->getMessage());
        }
    }
}
