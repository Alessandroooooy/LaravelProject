@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактирование профиля</h1>
        <form action="{{ route('user.update-profile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
