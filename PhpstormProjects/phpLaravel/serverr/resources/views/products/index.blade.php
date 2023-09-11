@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Каталог товаров</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Цена: ${{ $product->price }}</p>
                            <a href="{{ route('cart.add', ['product' => $product->id]) }}" class="btn btn-primary">Добавить в корзину</a>
                            <!-- Добавьте ссылку на страницу отзывов для данного товара -->
                            <a href="{{ route('reviews.index', ['product' => $product->id]) }}" class="btn btn-secondary">Отзывы</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
