@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Управление пользователями</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Дата регистрации</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->date_registered }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
