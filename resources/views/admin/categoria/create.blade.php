@extends('layouts.app')
@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> CATEGORIAS </h2>
                {!! Form::open(['route' => ['categoria.store'], 'method' => 'POST', 'files' => true]) !!}

                <div class="jumbotron bg-light text-start row">

                    <div class="form-group col-6">
                        <label for="slug">INGRESE SLUG</label>
                        {!! Form::text('slug', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_title">INGRESE SEO_TITLE</label>
                        {!! Form::text('seo_title', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_description">INGRESE SEO_DESCRIPTION</label>
                        {!! Form::text('seo_description', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_imagen">SELECCIONE SEO_IMAGE</label>
                        <img src={!! asset('img/categoria/' . null) !!}>
                        {!! Form::file('seo_imagen') !!} <br>
                    </div>


                    <div class="form-group col-6">
                        <label for="nombre">INGRESE NOMBRE</label>
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>


                    <div class="form-group col-6">
                        <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'maxlength' => '300', 'rows' => '6']) !!}
                    </div>

                    <div class="form-group col-6">
                        <br> <label for="imagen">SELECCIONE IMAGEN</label>
                        <img src={!! asset('img/categoria/' . null) !!}>
                        {!! Form::file('imagen') !!} <br>
                    </div>




                </div>

                <br>
                <div class="form-group text-right">
                    <a href="{{ route('categoria.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div>


                {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
