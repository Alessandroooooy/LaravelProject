@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить комментарий</h1>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Комментарий</label>
                <textarea id="body" name="body" class="form-control" rows="4" required></textarea>
            </div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-primary">Отправить комментарий</button>
        </form>
    </div>
@endsection
