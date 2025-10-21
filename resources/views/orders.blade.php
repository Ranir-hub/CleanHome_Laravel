@extends('layouts.layout')
@section('content')
<h2 class="mb-4">Список заказов</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">ID пользователя</th>
                <th scope="col" class="text-center">Время начала</th>
                <th scope="col" class="text-center">Время конца</th>
                <th scope="col" class="text-center">Итоговая стоимость</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="text-center fw-bold">{{$order->id}}</td>
                    <td class="text-center">{{$order->user_id}}</td>
                    <td class="text-center">{{$order->time_start}}</td>
                    <td class="text-center">{{$order->time_end}}</td>
                    <td class="text-center fw-bold text-success">{{$order->total_price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex align-items-center mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
            {{ $orders->links() }}
        </ul>
    </nav>
</div>
@endsection