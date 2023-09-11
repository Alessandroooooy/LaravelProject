@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Категория: {{ $category->name }}</h1>

        @if ($products !== null && count($products) > 0)
            <ul class="list-group">
                @foreach ($products as $product)
                    <li class="list-group-item">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p>Цена: ${{ $product->price }}</p>
                        <a href="{{ route('products.show', ['product' => $product->id, 'slug' => Str::slug($product->name)]) }}" class="btn btn-primary">Подробнее</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>В этой категории пока нет продуктов.</p>
        @endif
    </div>
@endsection

