@extends('layouts.layout')
@section('content')
    <h2 class="mb-4">{{$order ? "Список товаров заказа № ".$order->id : 'Неверный ID заказа' }}</h2>
    @if($order)
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Наименование</th>
                    <th scope="col" class="text-center">Цена за 1</th>
                    <th scope="col" class="text-center">Количество</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td class="text-center fw-bold">{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td class="text-center">{{$item->price}}</td>
                        <td class="text-center">{{$item->pivot->amount}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h2 class="mt-2">{{"Итого: ".$order->total_price}}</h2>
    @endif
@endsection