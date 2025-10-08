<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> 609-31 </title>
</head>
<body>
    <h2>Список пользователей:</h2>
    <table border="1">
    <thead>
        <td>id</td>
        <td>Имя</td>
        <td>Телефон</td>
        <td>Почта</td>
        <td>Организация</td>
    </thead>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{"+".$user->phone}}</td>
            <td>{{$user->email}}</td>
            @if($user->is_organization)
                <td>Да</td>
            @else
                <td>Нет</td>
            @endif
        </tr>
    @endforeach
    </table>
</body>
</html>