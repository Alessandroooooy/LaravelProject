@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Цена: ${{ $product->price }}</p>
                <p>Доступное количество: {{ $product->stock_quantity }}</p>
                <a href="{{ route('cart.add', ['product' => $product->id]) }}" class="btn btn-primary">Добавить в корзину</a>
                <a href="{{ route('reviews.index', ['product' => $product->id]) }}" class="btn btn-secondary">Отзывы</a>
            </div>
        </div>
    </div>
@endsection

