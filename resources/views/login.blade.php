@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        @if($user)
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title mb-3">Здравствуйте, {{ $user->name }}</h2>
                    <a href="{{ url('logout') }}" class="btn btn-outline-danger">Выйти из системы</a>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">Вход в систему</h2>
                    <form method="post" action="{{ url('auth') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Телефон</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"/>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror"/>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                    @error('error')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endif
    </div>
</div>
@endsection