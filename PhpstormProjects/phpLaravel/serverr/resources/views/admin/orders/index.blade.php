@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Управление заказами</h1>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Покупатель</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->date_created }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}" class="btn btn-primary">Просмотреть</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
