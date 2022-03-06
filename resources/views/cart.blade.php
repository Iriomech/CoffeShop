@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="row p-2">
        <div class="col-md-2">      
            <a href="{{ route('home') }}" class="btn border-yellow-900 border-1 hover:bg-yellow-900 hover:text-white">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>
    </div>
    <div class="row py-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) == 0)
                    <tr>
                        <td colspan="5" class="text-center">
                            <h3>No hay productos en el carrito</h3>
                        </td>
                    </tr>
                @else
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td><a class="p-2" href="{{ route('reduceToCart', $item->id) }}">-</a>{{ $item->quantity }}<a class="p-2" href="{{ route('addToCart', $item->id) }}">+</a></td>
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td>
                        <form action="{{ route('removeFromCart', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <td>${{ \Cart::session(auth()->id())->getSubTotal() }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>${{ \Cart::session(auth()->id())->getTotal() }}</td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('selectPayment') }}" method="post" class="space-y-2">
                @csrf
                <select name="payment" id="" class="form-control">
                    <option value="">Seleccione un método de pago</option>
                    <option value="cash">En caja</option>
                    <option value="credit card">Tarjeta de crédito</option>
                </select>
                <button type="submit" class="btn border-yellow-900 border-1 hover:bg-yellow-900 hover:text-white">
                    Pagar
                </button>
            </form>
        </div>
        <div class="col-lg-6">

        </div>
        <div class="col-lg-2">
            <a href="{{ route('clearCart') }}" class="btn btn-danger bg-red-700">Limpiar carrito</a>
        </div>
    </div>

</div>
@endsection