@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Checkout</h1>

        <form method="POST" action="{{ route('cart.confirm') }}">
            @csrf

            <!-- Ваши поля для ввода информации о доставке и контактных данных здесь -->

            <button type="submit" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
@endsection
