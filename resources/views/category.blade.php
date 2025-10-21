@extends('layouts.layout')
@section('content')
<h2 class="mb-4">{{$category ? "Список товаров категории ".$category->name : "Неверный ID категории"}}</h2>
@if($category)
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col">Наименование</th>
                <th scope="col" class="text-center">Цена</th>
                <th scope="col" class="text-center">В наличии</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category->items as $item)
                <tr>
                    <td class="text-center fw-bold">{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td class="text-center">{{$item->price}}</td>
                    <td class="text-center">{{$item->balance}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection