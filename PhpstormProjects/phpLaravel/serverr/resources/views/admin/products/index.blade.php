@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Управление товарами</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Доступное количество</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="POST" class="d-inline">
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
