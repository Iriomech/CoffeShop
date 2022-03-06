@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your Order has been placed') }}</div>

                    <div class="card-body">
                        <p class="text-center">
                            {{ __('Your order number is: ') $order->id }}
                        </p>

                        <a href="{{ route('home') }}" class="btn btn-primary">
                            {{ __('Go to Home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection