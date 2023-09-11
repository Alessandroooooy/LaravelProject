@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Категории товаров</h1>
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a>

                </li>
            @endforeach
        </ul>
    </div>
@endsection


