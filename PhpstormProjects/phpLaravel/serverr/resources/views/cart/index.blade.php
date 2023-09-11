@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>

        @if(count($cartItems) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <p>Total: ${{ Cart::subtotal() }}</p>
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection


