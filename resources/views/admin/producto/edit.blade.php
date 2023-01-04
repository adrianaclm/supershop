@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> PRODUCTOS </h2>
                {!! Form::open(['route' => ['producto.update', $producto], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">

                    <div class="form-group col-6">
                        <label for="slug">INGRESE SLUG</label>
                        {!! Form::text('slug', $producto->slug, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_title">INGRESE SEO_TITLE</label>
                        {!! Form::text('seo_title', $producto->seo_title, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_description">INGRESE SEO_DESCRIPTION</label>
                        {!! Form::text('seo_description', $producto->seo_description, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_image">SELECCIONE SEO_IMAGE</label><br>
                        <img class="border" style="width: 50mm" src={!! asset('img/producto/' . $producto->seo_image) !!}>
                        {!! Form::file('seo_image', ['class' => 'btn']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <br><label for="nombre">INGRESE NOMBRE DE PRODUCTO</label>
                        {!! Form::text('nombre', $producto->nombre, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="descripcion">INGRESE DESCRIPCION</label>
                        {!! Form::text('descripcion', $producto->descripcion, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="cod_barra">INGRESE CODIGO DE BARRA</label>
                        {!! Form::text('cod_barra', $producto->cod_barra, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="serial">INGRESE SERIAL</label>
                        {!! Form::text('serial', $producto->serial, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="cantidad_disponible">INGRESE CANTIDAD DISPONIBLE</label>
                        {!! Form::text('cant_disponible', $producto->stock, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-3 mt-1">
                        <label for="proveedor_id">ID DEL PROVEEDOR</label>
                        <select name="proveedor_id" class="form-control">
                            <option disabled selected> {{ $prd->pi}} - {{ $prd->pn}}</option>
                            @foreach ($proveedor as $p)
                               
                                <option value="{{ $p->id }}" >{{ $p->id }} - {{ $p->razon_social }}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <div class="form-group col-3 mt-1">
                        <label for="categoria_id">ID DE CATEGORIA</label>
                        <select name="categoria_id" class="form-control">
                            <option disabled selected>{{ $prd->ci }} - {{ $prd->cn}}</option>
                            @foreach ($categorias as $c)
                                   <option value="{{ $c->id }}" >{{ $c->id }} - {{ $c->nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <div class="form-group col-3 mt-1">
                        <label for="modelo_id">ID DE MODELO</label>
                        <select name="modelo_id" class="form-control">
                            <option disabled selected>{{ $prd->moi }} - {{ $prd->codigo}}</option>
                            @foreach ($modelos as $m)
                                   <option value="{{ $m->id }}" >{{ $m->id }} - {{ $m->codigo }}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <div class="form-group col-3 mt-1">
                        <label for="marca_id">ID DE MARCA</label>
                        <select name="marca_id" class="form-control">
                            <option disabled selected>{{ $prd->mi }} - {{ $prd->mn }}</option>
                            @foreach ($marcas as $m)
                               <option value="{{ $m->id }}" >{{ $m->id }} - {{ $m->nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="pvp_detal">INGRESE PRECIO DE VENTAL AL DETAL</label>
                        {!! Form::text('pvp_detal', $producto->pvp_detal, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="pvp_mayor">INGRESE PRECIO DE VENTA AL MAYOR</label>
                        {!! Form::text('pvp_mayor', $producto->pvp_mayor, ['class' => 'form-control']) !!}
                    </div>



                    <div class="form-group col-sm-4">
                        <label for="image">INGRESE FOTO DEL PRODUCTO</label>
                        <img class="border" style="width: 50mm" src={!! asset('img/producto/' . $producto->image) !!} width="300px" height='auto'>
                        {!! Form::file('image', ['class' => 'btn']) !!} <br>
                    </div>

                </div>


                <div class="form-group text-right">
                    <a href="{{ route('producto.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div>


                {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
