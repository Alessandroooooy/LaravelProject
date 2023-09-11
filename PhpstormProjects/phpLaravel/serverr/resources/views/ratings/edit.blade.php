@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать рейтинг</h1>

        <form action="{{ route('ratings.update', ['rating' => $rating->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="stars">Звезды (1-5)</label>
                <input type="number" name="stars" id="stars" class="form-control" min="1" max="5" required value="{{ $rating->stars }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
