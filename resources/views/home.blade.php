@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(count($products)>0)
        @foreach($products as $product)
        <div class="col-lg-4">
            <div class="card my-4">
                <img class="card-img-top align-middle justify-center" src="{{ $product->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title py-1 px-2">{{ $product->name }}</h5>
                    <p class="card-text py-1 px-2">{{ $product->description }}</p>
                    <p class="card-text py-4">${{ $product->price }}</p>
                    <a href="{{ route('show', $product->id) }}" class="btn border-yellow-900 border-1 hover:bg-yellow-900 hover:text-white">Ver</a>
                    <a href="{{ route('addToCart', $product->id) }}" class="btn border-yellow-900 border-1 hover:bg-yellow-900 hover:text-white">Comprar</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-4">
            <div class="card my-4">
                <div class="card-body">
                    <h5 class="card-title py-1 px-2">No hay productos</h5>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row justify-content-center py-4">
        {{ $products->links() }}
    </div>
</div>
@endsection


@section('footer')
<footer class="bg-[#8c6028] text-white text-center py-4">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <p>
                    Items in cart: {{ Cart::session(Auth::user()->id)->getTotalQuantity() }}
                </p>
            </div>
            <div class="col-4">
                <p>
                    Total: ${{ Cart::session(Auth::user()->id)->getTotal() }}
                </p>
            </div>
            <div class="col-4">
                <p>
                    <a href="{{ route('cart') }}" class="btn border-white border-1 bg-white text-black">
                        Ver carrito
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
@endsection