@extends('layouts.page')

@section('content')
<div class="container-fluid">


    <!-- inicio carrusel -->
    <div class="container-fluid p-0 m-0 articulo">
        <div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="false">
            <div class="carousel-inner">
                @foreach ($imgs as $key => $img)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($img->image)
                    <img class="d-block w-100" alt="..." src={!! asset('img/carrusel/' .$img -> image) !!} />
                    @endif
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <a href="{{ $img->link }}" class="btn btn-outline-danger">VER MÁS</a>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Mensajes de la empresa -->

    <div class="container-fluid articulo">
        <div class="row mt-5 mb-5 justify-content-center text-center">
            <div class="col-sm-12">
                <h1 class="slogan mt-1 mb-1">{{ $config->slogan }}</h1>
            </div>

            <div class="col-sm-3">
                <p class="text-center">{{ $config->frase1 }} </p>
            </div>
            <div class="col-sm-3">
                <p class="text-center">{{ $config->frase2 }} </p>
            </div>
            <div class="col-sm-3">
                <p class="text-center">{{ $config->frase3 }} </p>
            </div>

        </div>

    </div>



    <!--/ tarjetas categoria -->

    <div class="container-fluid ">
        <div class="row justify-content-center articulo">
            <a class="text-decoration-none mb-3">
                <h2 class="h2p">Categorías</h2>
            </a>

            @foreach ($categorias as $c)
            <div class="col-6 col-sm-4 col-md-4 col-xl-3 mb-3 articulo">
                <div class="card border-2 rounded-4">
                    <a href="{{ url('/' . $c->slug) }}">
                        <img src={!! asset('img/categoria/' . $c->imagen) !!} class="card-img-top p-2 rounded-4" width="250"
                        height="250">
                    </a>
                    <div class="text-center rounded-3 border-top border-danger border-5 p-2 " style="--bs-border-opacity: .4;">
                        <a href="{{ url('/' . $c->slug) }}">
                            <h6 class="card-title text-center mb-2">{{ $c->nombre }}</h6>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- productos -->

    <div class="container-fluid ">
        <div class="row justify-content-center m-2 articulo">
            <a class="text-decoration-none">
                <h2 class=h2p>Productos</h2>
            </a>
        </div>

        <div class="row">
            @foreach ($productos as $r)
            <div class="col-6 col-sm-4 col-md-4 col-xl-3 mb-1 articulo">
                <div class="card border-2 rounded-4" style="margin-bottom: 20px; height: auto;">
                    <img class="card-img-top mx-auto my-2 p-2 rounded rounded-4" style="height: 150px; width: 150px; display: block;" alt="{{ $r->image }}" src={!! asset('img/producto/' . $r->image) !!} >
                    <div class="card-body">
                        <a href="{{ url('/descripcion/' . $r->id) }}">
                            <h6 class="card-title text-center mb-2">{{ $r->nombre }}</h6>
                        </a>

                        <form action="{{ route('cart.store') }}" method="POST" class="form-cedula">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $r->id }}" id="id" name="id">
                            <input type="hidden" value="{{ $r->nombre }}" id="nombre" name="nombre">
                            <input type="hidden" value="{{ $r->pvp_detal }}" id="pvp_detal" name="price">
                            <input type="hidden" value="{{ $r->image }}" id="image" name="image">
                            <input type="hidden" value="{{ $r->slug }}" id="slug" name="slug">
                            <input type="hidden" value="1" id="quantity" name="quantity">
                            <div class="card-footer" style="background-color: white;">
                                <div class="row">
                                    <button class="btn btn-danger btn-sm tooltip-test" title="add to cart">
                                        <i class="fa fa-shopping-cart"></i> Agregar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <!--   pie de pagina medios y contacto-->
    <div class="row border border-danger border-5 rounded m-0">
        <br>
        <div class="row"></div>
        <div class="col-6 col-md-4 col-lg-2 mb-0 mt-1 text-center">
            <h6 class="text-centert"><b>MEDIOS DE PAGO</b></h6>
            <img src={!! asset('img/footer/maestro.jpg') !!} class="image m-1" width="65" height="auto"></a>
            <img src={!! asset('img/footer/marter.jpg') !!} class="image m-1" width="70" height="auto"></a><br>
            <img src={!! asset('img/footer/visa.jpg') !!} class="image m-1" width="65" height="auto"></a>
            <img src={!! asset('img/footer/paypal.jpg') !!} class="image m-1" width="65" height="auto"></a>
            <p class="h6 p-2">Efectivo</p>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-0 mt-1 text-center">
            <h6 class="text-centert"><b>MEDIOS DE ENVÍO</b></h6>
            <img src={!! asset('img/footer/mercadolibre.svg') !!} class="image m-2" width="65" height="auto">
            <img src={!! asset('img/footer/pedidosya.svg') !!} class="image m-2" width="90" height="auto">
            <p class="h6 m-1">Retiro en tienda</p>
            <p class="h6 m-1">Envío Nacional</p>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mt-1 text-start">
            <h6 class="text-centert m2 mb-3 "><b>CONTÁCTANOS</b></h6>
            <a class="nav-link m-1 icns " href="https://wa.me/582125752732" target="_blank">
                <i class="wht fa-brands fa-whatsapp"></i> +582125752732</a>
            <a class="nav-link m-1 icns" href="https://www.facebook.com/Supershopep-103133128804417/" target="_blank"><i class="fa-brands fa-facebook"></i> Supershopep</a>
            <a class="nav-link m-1 icns" href="https://instagram.com/supershopep_oficial?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa-brands fa-instagram"></i> @supershopep_oficial</a>
            <a class="nav-link m-1 icns" href="mailto:Supershopep@gmail.com"><i class="fa-regular fa-envelope"></i>
                Supershopep@gmail.com</a>
        </div>
        <div class="col-12 col-md-3 col-lg-3 mb-0 mt-1 text-center">
            <h6 class="text-centert"><b>UBICACIÓN</b></h6>
            <div class="nav-link">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1166.3098124433482!2d-66.90728620919562!3d10.502007865226918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a5ed4810022b1%3A0x95a96d1d31e61790!2sCentro%20Parque%20Carabobo%2C%20Avenida%20Universidad%2C%20Caracas%201011%2C%20Distrito%20Capital!5e0!3m2!1ses!2sve!4v1663453031798!5m2!1ses!2sve" class="border border-dark border-1" width="auto" height="150" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-2 mx-auto mt-0 p-0 text-left h6 text-centert">
            <br><br>
            Estamos ubicados en:<br>
            Centro Parque Carabobo,<br>
            Piso 7, Oficina 716,
            Torre A,<br>
            La Candelaria, Caracas.<br>

        </div>
        <br>
        <div class="row"></div>
        <br>
        <br>
    </div>

    <!-- Barra de derechos de autor -->

    <ul class="nav row justify-content-center text-bg-light text-center ">
        <li class="col-12">
            <a class="nav-link" aria-current="page" href="https://wa.me/584142171228" target="_blank">
                <p>
                    <small>
                        <i class="fa-regular fa-copyright"></i>
                        Derechos Reservados 2022 | Adriana Lobo - Multiempresas GM | Contáctanos <small>
                            <i class="whtf fa-brands fa-whatsapp"></i>
                </p>
            </a>
        </li>
    </ul>
    <div>
    @endsection