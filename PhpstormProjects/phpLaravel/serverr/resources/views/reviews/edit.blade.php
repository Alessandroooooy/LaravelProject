@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать отзыв</h1>

        <form method="POST" action="{{ route('reviews.update', ['review' => $review->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="text">Текст отзыва:</label>
                <textarea class="form-control" id="text" name="text" rows="4" required>{{ $review->text }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
