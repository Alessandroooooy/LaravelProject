@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить отзыв</h1>

        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf
            <!-- Ваши поля формы -->
            <div class="form-group">
                <label for="text">Текст отзыва:</label>
                <textarea name="text" id="text" class="form-control"></textarea>
            </div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-primary">Отправить отзыв</button>
        </form>
    </div>
@endsection
