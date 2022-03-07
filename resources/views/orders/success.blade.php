@extends('layouts.app')

@section('content')
<div class="container align-center">
    <p class="h1 text-center">Thank you for your order!</p>
    <p class="h3 text-center">Your order number is {{ $order->id }}.</p>
    <p class="text-center">
        Your order has been successfully processed! Thank you for your business.
        Go to the cashier to collect your order.
    </p>
    <p class="text-center">
        <a href="{{ route('home') }}" class="btn btn-primary">
            Go to homepage
        </a>
    </p>
</div>
@endsection