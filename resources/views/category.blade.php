<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 609-31 </title>
</head>
<body>
    <h2>{{$category ? "Список товаров категории ".$category->name : "Неверный ID категории"}}</h2>
    @if($category)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>В наличии</td>
        </thead>
        @foreach ($category->items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->balance}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>