@extends('layouts.app')

@section('content')
    <!-- Главный баннер -->
    <div class="jumbotron text-center">
        <h1>Добро пожаловать в наш магазин</h1>
        <p>Лучшие товары по самым выгодным ценам</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Посмотреть товары</a>
    </div>

    <!-- Секция с популярными товарами -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Популярные товары</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Цена: ${{ $product->price }}</p>
                            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Дополнительная информация о магазине -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">О нашем магазине</h2>
            <p class="text-center">Мы предлагаем широкий выбор товаров высокого качества.</p>
        </div>
    </section>
@endsection
