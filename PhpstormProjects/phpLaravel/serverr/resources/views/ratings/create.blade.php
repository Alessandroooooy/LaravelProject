
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать рейтинг</h1>

        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="stars">Звезды (1-5)</label>
                <input type="number" name="stars" id="stars" class="form-control" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="product_id">ID продукта</label>
                <input type="number" name="product_id" id="product_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
