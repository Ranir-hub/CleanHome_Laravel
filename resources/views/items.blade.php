@extends('layouts.layout')
@section('content')
<h2 >Список товаров</h2>
<a href="{{ url('item/create') }}" class="btn btn-primary mb-2">Создать товар</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col">Наименование</th>
                <th scope="col" class="text-center">Цена</th>
                <th scope="col" class="text-center">В наличии</th>
                <th scope="col">Категория</th>
                <th scope="col" class="text-center">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items->sortBy('id') as $item)
                <tr>
                    <td class="text-center fw-bold">{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td class="text-center">{{$item->price}}</td>
                    <td class="text-center">{{$item->balance}}</td>
                    <td>{{$item->category->name}}</td>
                    <td class="text-center">
                        <a href="{{url('item/edit/'.$item->id)}}" class="btn btn-sm btn-outline-primary me-2">Редактировать</a>
                        <a href="{{url('item/destroy/'.$item->id)}}" class="btn btn-sm btn-outline-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection