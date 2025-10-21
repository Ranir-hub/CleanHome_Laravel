<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title> 609-31 </title>
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0d6efd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Товары
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('item') }}">Все товары</a></li>
                            <li><a class="dropdown-item" href="{{ url('item/create') }}">Добавить товар</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('category') }}">Категории</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('order') }}">Заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user') }}">Покупатели</a>
                    </li>
                </ul>

                <div class="d-flex">
                    @if(!Auth::user())
                    <form class="d-flex" method="post" action="{{ url('auth') }}">
                        @csrf
                        <input class="form-control me-2" type="text" placeholder="Телефон" name="phone" 
                            aria-label="Телефон" value="{{ old('phone') }}"/>
                        <input class="form-control me-2" type="password" placeholder="Пароль" name="password" 
                            aria-label="Пароль"/>
                        <button class="btn btn-outline-light" type="submit">Войти</button>
                    </form>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fa fa-user me-1" style="font-size:20px;color:white;"></i>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light ms-2" href="{{ url('logout') }}">Выйти</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<body class="d-flex flex-column">
    @include('error')
    <div class = "container">
        <div class="row justify-content-center mt-2">
            @yield('content')
        </div>
    </div>
</body>
</html>