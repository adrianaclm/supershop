<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', $config->seo_title)</title>
    <meta property="og:type" content="website" />
    <meta property="og:url" content=@yield('url', 'https://supershopep.com') />
    <meta property="og:site_name" content="supershopep.com" />
    <link rel="canonical" href=@yield('url', 'https://supershopep.com') />

    <!-- Fonts -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/29c05b9093.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comic+Neue&family=Dancing+Script:wght@700&family=Montserrat:wght@200;500&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- mi barra -->

    <nav class="navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm">
        <div class="container-fluid">
            <!-- icono -->
            <a class="navbar-brand d d-md-block d-xl-block" href="{{ url('/#') }}">
                <img alt="supershop" width="200" height="35" class="d-inline-block aling-text-top" src={{ asset('img/configuracion/' . $config->logo) }} />
            </a>

            <!-- boton del menu-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- elemento del menu colapsable-->

            <!--barra de busqueda
            <div class="collapse navbar-collapse" id="menu">
                <form class="d-flex m-auto mb-2" role="search">
                    <input class="barra form-control me-3 text-center" name="buscador" id="buscador" type="search"
                        placeholder="Buscar Productos" aria-label="Search" />
                    <button class="btnb" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <ul class="navbar-nav mb-2 mb-lg-0">
-->
                        <!--listado de categorias
                        <li class="nav-item dropdown">
                            <a id="catdes" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($menu as $c)
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/tienda/' . $c->slug) }}">
                                            <h6 id="catdes">{{ $c->nombre }} </h6>
                                        </a>

                                    </li>
                                @endforeach
                            </ul>
                        </li>-->

                        <!--carrito de compra
                        <li id="catdes" class="nav-item">
                            <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                                <i class="is fa-solid fa-cart-shopping"></i>
                                <span id=bola class="badge rounded-pill bg-danger border border-light">
                                    <b>{{ \Cart::getTotalQuantity() }}</b>
                                    <span class="visually-hidden">Artículos en carrito</span>
                            </a>
                        </li>-->

                        <!--acceso a cuenta
                        @guest @if (Route::has('login'))
                            <li class="nav-item" id="catdes">
                                <a class="nav-link" rel="nofollow" href="{{ route('login') }}">
                                    <i class="is fa-solid fa-user"></i>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="catdes" class="nav-link dropdown-toggle" href="{{ route('logout') }}"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                <i class="is fa-solid fa-user"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="catdes">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest-->
                </ul>
            </div>
        </div>
</nav>

<!-- bola de whatsapp -->

<a href="https://wa.me/582125752732" class="btn-wsp" target="_blank">
    <i class="fa fa-whatsapp icono"></i>
</a>

<script>
    document.addEventListener("keyup", e=>{
        if (e.target.matches("#buscador")){
            if (e.key === "Escape")e.target.value = ""
            document.querySelectorAll(".articulo").forEach(producto =>{
                producto.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ?producto.classList.remove("filtro")
                :producto.classList.add("filtro")
            })
        }
    })
</script>

</body>

</html>

@yield('content')
