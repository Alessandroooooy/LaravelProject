@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Комментарии для товара: {{ $product->name }}</h1>
        <ul class="list-group">
            @foreach ($comments as $comment)
                <li class="list-group-item">
                    <h3>Пользователь: {{ $comment->user->name }}</h3>
                    <p>Комментарий: {{ $comment->body }}</p>
                    <p>Дата: {{ $comment->created_at }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
