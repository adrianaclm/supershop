@extends('layouts.page')
@section('content')
    <div class="container">

        @if (session()->has('success_message'))
            <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('success_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb">
                        <a href="{{ route('inicio') }}">
                            <h6> Regresar </h6>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <h6> / Categoría: {{ $categoria->nombre }} </h6>
                    </li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mb-3 mt-0">
                            <h2>Productos</h2>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($categoria->productos as $r)
                            <div class="col-6 col-md-3 col-lg-3">
                                <div class="card articulo" style="margin-bottom: 20px; height: auto;">
                                    <img src={!! asset('img/producto/' . $r->image) !!} class="card-img-top mx-auto my-2 rounded rounded-2"
                                        style="height: 150px; width: 150px;display: block;" alt="{{ $r->image }}">
                                    <div class="card-body">
                                        <a href="{{ url('/tienda/descripcion/' . $r->id) }}">
                                            <h6 class="card-title text-center">{{ $r->nombre }}</h6>
                                        </a>
                                        <p class="m-0">Detal: {{ $r->pvp_detal }} $</p>
                                        <p class="m-0 mb-2">Mayor: {{ $r->pvp_mayor }} $</p>

                                        <form action="{{ route('cart.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $r->id }}" id="id"
                                                name="id">
                                            <input type="hidden" value="{{ $r->nombre }}" id="nombre"
                                                name="nombre">
                                            <input type="hidden" value="{{ $r->pvp_detal }}" id="pvp_detal"
                                                name="price">
                                            <input type="hidden" value="{{ $r->image }}" id="image"
                                                name="image">
                                            <input type="hidden" value="{{ $r->slug }}" id="slug"
                                                name="slug">
                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                            <div class="card-footer" style="background-color: white;">
                                                <div class="row">
                                                    <button class="btn btn-secondary btn-sm" class="tooltip-test"
                                                        title="add to cart">
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
            </div>


        </div>

       
    </div>
    @endsection
