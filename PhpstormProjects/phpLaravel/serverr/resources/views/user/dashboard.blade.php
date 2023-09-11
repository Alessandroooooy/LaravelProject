@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Личный кабинет</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">Профиль</div>
                    <div class="card-body">
                        <p>Имя: {{ Auth::user()->name }}</p>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <a href="{{ route('user.edit-profile') }}" class="btn btn-primary">Редактировать профиль</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Заказы</div>
                    <div class="card-body">
                        @if (count($orders) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Дата создания</th>
                                    <th>Статус</th>
                                    <th>Общая стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->date_created }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>${{ $order->total_price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>У вас нет заказов.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
