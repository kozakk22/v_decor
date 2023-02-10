<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $shop->description }}">
    <meta name="keywords" content="{{ $shop->keywords }}">
    <title>Інтернет-магазин {{ $shop->name_shop }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/offcanvas.css') }}" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

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
<body  class="bg-light">
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand fs-1 text-warning" href="/">
            @if(isset($shop->logo))
                <img src="{{ url('storage/' . $shop->logo) }}" alt="logo" height="70px" >
            @else
                {{ $shop->name_shop }}
            @endif</a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if($menu == 'delivery') active @endif" aria-current="page" href="{{ route('delivery') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg> Доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($menu == 'payment') active @endif" href="{{ route('payment') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                        </svg> Оплата</a>
                </li>
            </ul>

            @if(isset($shop->phone))
                <div class="me-4 text-warning fs-4">
                    {{ $shop->phone }}
                </div>
            @endif
                <form class="d-flex" action="{{ route('order_call') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control me-3" type="text" name="phone_number_top" placeholder="+38(0XX)XXXXXXX" aria-label="Search">
                    <button class="btn btn-outline-warning me-3" type="submit">Замовити дзвінок</button>
                    @error('phone_number_top')
                    <p class="text-danger">Не вірний формат номеру телефону</p>
                    @enderror
                </form>

        </div>
        <div class="me-4">
            <a href="{{ route('cart') }}" class="text-warning position-relative" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                @if(isset($filters['cart']))
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    @php($count=0)
                    @foreach($filters['cart'] as $filter)

                        @php($count++)
                    @endforeach
                    {{ $count }}
                    <span class="visually-hidden">unread messages</span></span>
                @endif
            </a>
        </div>
    </div>
</nav>
<main>
    @yield('content')
</main>

<footer class="text-muted py-5 navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
            <div class="row">
                @if(isset($shop->name_manager))
                <div class="col">
                    Ваш менеджер: {{ $shop->name_manager }}
                </div>
                @endif
                @if(isset($shop->phone))
                <div class="col">
                    Телефон: {{ $shop->phone }}
                </div>
                @endif
                @if(isset($shop->mail))
                <div class="col">
                    Mail: {{ $shop->mail }}
                </div>
                @endif
                @if(isset($shop->instagram))
                <div class="col">
                    Instagram: <a href="{{ $shop->instagram }}" style="text-decoration: none" class="text-secondary">{{ $shop->instagram }}</a>
                </div>
                @endif
            </div>
        </div>
</footer>


<script src="{{ asset('assets/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/offcanvas.js') }}"></script>


</body>
</html>
