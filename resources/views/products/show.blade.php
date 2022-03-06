@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-8 pt-32 space-y-3">
                    <p>{{ $product->description }}</p>
                    <p>${{ $product->price }}</p>
                    <a href="{{ route('addToCart', $product->id) }}" class="btn border-yellow-900 border-1 hover:bg-yellow-900 hover:text-white">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection