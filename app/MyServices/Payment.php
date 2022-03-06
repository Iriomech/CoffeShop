<?php

namespace App\MyServices;

use Illuminate\Support\Facades\Auth;

use App\Models\PaymentMethod;

class Payment 
{
    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    public function createPaymentMethod($number, $exp_month, $exp_year, $cvc)
    {
        // Crea el objeto customer en Stripe
        $customer = $this->stripe->customers->create([
            'email' => Auth::user()->email,
        ]);
        //Guarda el id del customer en la base de datos
        Auth::user()->customer_id = $customer->id;
        Auth::user()->save();
        // Crea el objeto payment method en Stripe
        $paymentMethod = $this->stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => $number,
                'exp_month' => $exp_month,
                'exp_year' => $exp_year,
                'cvc' => $cvc,
            ],
        ]);

        PaymentMethod::create([
            'user_id' => Auth::user()->id,
            'stripe_id' => $paymentMethod->id,
        ]);

        // Lo asocia al customer
        $paymentMethod = $this->stripe->paymentMethods->attach(
            $paymentMethod->id,
            ['customer' => $customer->id]
        );
        // Devuelve el objeto payment method
        return $paymentMethod;
    }

    public function createPaymentIntent($amount, $currency)
    {
        // Crea el objeto payment intent en Stripe
        $amount = $amount * 100;
        $paymentIntent = $this->stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => $currency,
            'customer' => Auth::user()->customer_id,
        ]);
        // Devuelve el objeto payment intent
        return $paymentIntent;
    }

    public function confirmPaymentIntent($paymentIntentId, $paymentMethodId)
    {
        // Confirma el payment intent en Stripe
        $paymentIntent = $this->stripe->paymentIntents->confirm([
            'payment_method' => $paymentMethodId,
            'payment_intent_id' => $paymentIntentId,
        ]);
        // Devuelve el objeto payment intent
        return $paymentIntent;
    }

    public function updatePaymentIntent($paymentIntentId, $amount)
    {
        // Actualiza el payment intent en Stripe
        $amount = $amount * 100;
        $paymentIntent = $this->stripe->paymentIntents->update($paymentIntentId, [
            'amount' => $amount,
        ]);
        // Devuelve el objeto payment intent
        return $paymentIntent;
    }

    public function cancelPaymentIntent($paymentIntentId)
    {
        // Cancela el payment intent en Stripe
        $paymentIntent = $this->stripe->paymentIntents->cancel($paymentIntentId);
        // Devuelve el objeto payment intent
        return $paymentIntent;
    }

    public function retrievePaymentIntent($paymentIntentId)
    {
        // Recupera el payment intent en Stripe
        $paymentIntent = $this->stripe->paymentIntents->retrieve($paymentIntentId);
        // Devuelve el objeto payment intent
        return $paymentIntent;
    }

    public function createAndConfirmPaymentIntent($amount, $currency, $paymentMethodId)
    {
        // Crea el objeto payment intent en Stripe y lo confirma con el payment method
        $amount = $amount * 100;
        $paymentIntent = $this->stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => $currency,
            'payment_method' => $paymentMethodId,
            'confirm' => true,
            'customer' => Auth::user()->customer_id,
        ]);

        return $paymentIntent;
    }
}
    
