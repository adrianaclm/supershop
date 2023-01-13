@extends('layouts.page')

@section('content')
    <div class="container-fluid">



        <div class="row justify-content-center">
            <a class="text-decoration-none">
                <h2 class="h2p text-wrap">{{ $prd->nombre }}</h2>
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="row mt-5">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    <img class="descripcion border rounded-4" src={{ asset('img/producto/' .$producto->image) }} >
                </div>

                <div class="col-12-sm col-md-6 col-lg-6 ">
                    <div class="col-12">
                        <h3 class="mt-3">{{ $prd->nombre }}</h3>
                        <div class="line line-sm"></div>
                        <div class="product-price mt-2">
                            $<span id="prprice"> {{ $prd->pvp_detal }}</span>
                        </div>
                        <div class="clear">
                        </div>
                        <div class="line line-sm mt-3 mb-2">
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="container agregar">
                                    
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $producto->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $producto->nombre }}" id="nombre" name="nombre">
                                        <input type="hidden" value="{{ $producto->pvp_detal }}" id="pvp_detal" name="price">
                                        <input type="hidden" value="{{ $producto->image }}" id="image" name="image">
                                        <input type="hidden" value="{{ $producto->slug }}" id="slug" name="slug">
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

                        <div class="line line-sm mt-3 mb-3">
                        </div>

                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Código: </b>
                                <span style="float:right;">{{ $prd->id }}</span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Ref: </b>
                                <span style="float:right;">{{ $prd->cod_barra }}</span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Inventario: </b>
                                <span style="float:right;">En stock hoy</span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Medidas: </b>
                                <span style="float:right;"> {{ $prd->tamano }} </span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Precio al Mayor (Incluye IVA): </b>
                                <span style="float:right;">{{ $prd->pvp_mayor }} </span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Estatus: </b>
                                <span style="float:right;">NUEVO</span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Empaque: </b>
                                <span style="float:right;">UND (1)</span>
                            </li>

                            <li class="list-group-item">
                                <i class="icon-caret-right"></i>
                                <b>Marca: </b>
                                <span style="float:right;">{{ $prd->mn }}</span>
                            </li>

                        </ul>

                        <div class="clear"></div>
                        <div class="line line-sm mb-2"></div>
                        <div class="label-rating cllo-label margentopp2em">
                            <i class="icon-info"></i>
                            Precio incluye impuesto (IVA).
                        </div>
                    </div>
                </div>

                <div class="col-12  mb-5">
                    <div class="row mt-3">

                        <div class="col-4">
                            <div class="fbox-icon">
                                <i class="fa-solid fa-credit-card"></i>
                            </div>
                            <h6 class="colorblack text-center p-0 m-0">Formas de pago</h6>
                            <div class="row m-1"></div>
                            <p class="h text-wrap">Aceptamos TDC nacional e internacionales, Paypal,
                                Zelle y Pago móvil</p>
                        </div>
                        <div class="col-4">
                            <div class="fbox-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h6 class="colorblack text-center p-0 m-0">Despacho</h6>
                            <div class="row m-1"></div>
                            <p class="h text-wrap">Envio a todo el territorio nacional.</p>
                        </div>
                        <div class="col-4">
                            <div class="fbox-icon">
                                <i class="fa-sharp fa-solid fa-arrow-rotate-left"></i>
                            </div>
                            <h6 class="colorblack text-center p-0 m-0">Devoluciones</h6>
                            <div class="row m-1"></div>
                            <p class="h text-wrap">Cuentas con un máximo de 2 días luego de
                                recibir
                                tu
                                pedido para notificar alguna queja o reclamo.</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
