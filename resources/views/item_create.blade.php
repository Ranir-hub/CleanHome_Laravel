@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <h2 class="mb-4">Добавление товара</h2>
        <form method="post" action="{{ url('item') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Наименование</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"/>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Цена</label>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror"/>
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Количество</label>
                <input type="text" name="balance" value="{{ old('balance') }}" class="form-control @error('balance') is-invalid @enderror"/>
                @error('balance')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Категория</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            @if(old('category_id') == $category->id) selected @endif>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror   
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection