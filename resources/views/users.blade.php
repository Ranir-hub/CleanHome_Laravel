@extends('layouts.layout')
@section('content')
<h2 class="mb-4">Список пользователей:</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Телефон</th>
                <th scope="col">Почта</th>
                <th scope="col" class="text-center">Организация</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center fw-bold">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{"+".$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-center">
                        @if($user->is_organization)
                            <span class="badge bg-success">Да</span>
                        @else
                            <span class="badge bg-secondary">Нет</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection