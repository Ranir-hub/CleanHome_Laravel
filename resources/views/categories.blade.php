@extends('layouts.layout')
@section('content')
<div class="col-8">
    <h2 class="mb-4">Список категорий:</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Наименование</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center fw-bold">{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection