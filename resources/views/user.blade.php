@extends('layouts.layout')
@section('content')
<h2 class="mb-4">{{$user ? "Список заказов ".$user->name : "Неверный ID пользователя"}}</h2>
@if($user)
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Время начала заказа</th>
                <th scope="col" class="text-center">Время окончания заказа</th>
                <th scope="col" class="text-center">Итоговая стоимость</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->orders as $order)
                <tr>
                    <td class="text-center fw-bold">{{$order->id}}</td>
                    <td class="text-center">{{$order->time_start}}</td>
                    <td class="text-center">{{$order->time_end}}</td>
                    <td class="text-center fw-bold text-success">{{$order->total_price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection