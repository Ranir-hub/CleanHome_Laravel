<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 609-31 </title>
</head>
<body>
    <h2>{{$user ? "Список заказов ".$user->name : "Неверный ID категории"}}</h2>
    @if($user)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Время начала заказа</td>
            <td>Время окончания заказа</td>
            <td>Итоговая стоимость</td>
        </thead>
        @foreach ($user->orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->time_start}}</td>
                <td>{{$order->time_end}}</td>
                <td>{{$order->total_price}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>