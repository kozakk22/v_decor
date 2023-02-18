<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адміністратор {{ $name_shop }}</title>

    <!-- Styles -->
    <link href="{{ asset('../assets/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/dist/css/offcanvas.css') }}" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('../assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body class="bg-secondary">

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ $name_shop }}</a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if($menu == 'orders') active @endif" aria-current="page" href="{{ route('admin.orders.index') }}">Замовлення</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu == 'goods') active @endif" href="{{ route('admin.goods.index') }}">Товари</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu == 'shop') active @endif" href="{{ route('admin.shop.edit', '1') }}">Магазин</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu == 'categories') active @endif" href="{{ route('admin.categories.index') }}">Категорії</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                        {{ __('Вихід') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

            @if($menu == 'goods')
                <form class="d-flex" action="{{ route('admin.goods.index') }}" method="get" enctype="multipart/form-data">
                    <input class="form-control me-3" type="search" name="search" placeholder="Назва товару" aria-label="Search" @isset($search) value="{{  $search  }}" @endisset>
                    <button class="btn btn-outline-warning" type="submit">Пошук</button>
                </form>
            @endif
            @if($menu == 'orders')
                <form class="d-flex" action="{{ route('admin.orders.index') }}" method="get" enctype="multipart/form-data">
                    <input class="form-control me-3" type="search" name="search" placeholder="Номер тел замовника" aria-label="Search" @isset($search)  value="{{ $search }}" @endisset>
                    <button class="btn btn-outline-warning" type="submit">Пошук</button>
                </form>
            @endif


</div>
</div>
</nav>

<main class="container-fluid">
@yield('content')
</main>

<script src="{{ asset('assets/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/offcanvas.js') }}"></script>


</body>
</html>
