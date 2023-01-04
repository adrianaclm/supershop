@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> PEDIDOS </h2>
                {!! Form::open(['route' => 'pedido.store', 'method' => 'POST', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">

                    <div class="form-group col-sm-6">
                        <label for="slug">INGRESE SLUG</label>
                        {!! Form::text('slug', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="seo_title">INGRESE SEO_TITLE</label>
                        {!! Form::text('seo_title', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group">
                        <label for="seo_description">INGRESE SEO_DESCRIPTION</label>
                        {!! Form::text('seo_description', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group">
                        <label for="seo_imagen">SELECCIONE SEO_IMAGE</label>
                        {!! Form::file('seo_imagen') !!} <br>
                    </div>

                    <div class="form-group">
                        <br><label for="nombre">INGRESE NOMBRE DEL PRODUCTO</label>
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => '150']) !!} <br>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">INGRESE DESCRIPCION</label>
                        {!! Form::text('descripcion', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="cod_barra">INGRESE CODIGO DE BARRA</label>
                        {!! Form::text('cod_barra', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="serial">INGRESE SERIAL</label>
                        {!! Form::text('serial', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="stock">INGRESE CANTIDAD DISPONIBLE</label>
                        {!! Form::text('stock', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="pvp_detal">INGRESE PRECIO DE VENTAL AL DETAL</label>
                        {!! Form::text('pvp_detal', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="pvp_mayor">INGRESE PRECIO DE VENTA AL MAYOR</label>
                        {!! Form::text('pvp_mayor', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="image">INGRESE FOTO DEL PRODUCTO</label>
                        {!! Form::file('image') !!} <br>
                    </div>

                    <div class="form-group col-3 mt-3 mb-1">
                        <label for="proveedor_id">ID DEL PROVEEDOR</label>
                        <select name="proveedor_id" class="form-control">
                            <option value="0">Seleccione uno</option>
                            @foreach ($proveedor as $p)
                                <option value="{{ $p->id }}">{{ $p->razon_social }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mt-3 mb-1">
                        <label for="categoria_id">ID DE CATEGORIA</label>
                        <select name="categoria_id" class="form-control">
                            <option value="0">Seleccione uno</option>
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mt-3 mb-1">
                        <label for="modelo_id">ID DE MODELO</label>
                        <select name="modelo_id" class="form-control">
                            <option value="0">Seleccione uno</option>
                            @foreach ($modelos as $m)
                                <option value="{{ $m->id }}">{{ $m->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mt-3 mb-1">
                        <label for="marca_id">ID DE MARCA</label>
                        <select name="marca_id" class="form-control">
                            <option value="0">Seleccione uno</option>
                            @foreach ($marcas as $m)
                                <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group text-right mt-2">
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
