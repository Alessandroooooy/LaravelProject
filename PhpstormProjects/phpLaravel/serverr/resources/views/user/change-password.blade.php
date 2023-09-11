@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Изменение пароля</h1>
        <form action="{{ route('user.update-password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="current_password">Текущий пароль</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Новый пароль</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Подтверждение нового пароля</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Сменить пароль</button>
        </form>
    </div>
@endsection
