@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Отзывы для товара: {{ $product->name }}</h1>
        <ul class="list-group">
            @foreach ($reviews as $review)
                <li class="list-group-item">
                    <h3>Пользователь: {{ $review->user->name }}</h3>
                    <p>Рейтинг: {{ $review->rating }}/5</p>
                    <p>Комментарий: {{ $review->comment }}</p>
                    <p>Дата: {{ $review->date_posted }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
