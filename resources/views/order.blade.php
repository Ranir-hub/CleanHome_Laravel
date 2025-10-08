<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 609-31 </title>
</head>
<body>
    <h2>{{$order ? "Список товаров заказа № ".$order->id : 'Неверный ID заказа' }}</h2>
    @if($order)
    <table border="1">
    <thead>
        <td>id</td>
        <td>Наименование</td>
        <td>Цена за 1</td>
        <td>Количество</td>
    </thead>
        @foreach ($order->items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->pivot->amount}}</td>
            </tr>
        @endforeach
    </table>
    <h2>{{"Итого: ".$order->total_price}}</h2>
    @endif
</body>
</html>