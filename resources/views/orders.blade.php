<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 609-31 </title>
</head>
<body>
    <h2>Список заказов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>id пользователя</td>
            <td>Время начала</td>
            <td>Время конца</td>
            <td>Итоговая стоимость</td>
        </thead>
    @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->user_id}}</td>
            <td>{{$order->time_start}}</td>
            <td>{{$order->time_end}}</td>
            <td>{{$order->total_price}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>