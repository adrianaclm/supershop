@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> CATEGORIAS </h2>
                {!! Form::open(['route' => ['categoria.update', $categoria], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron bg-light text-start row">

                    <div class="form-group col-6">
                        <label for="slug">INGRESE SLUG</label>
                        {!! Form::text('slug', $categoria->slug, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_title">INGRESE SEO_TITLE</label>
                        {!! Form::text('seo_title', $categoria->seo_title, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="seo_description">INGRESE SEO_DESCRIPTION</label>
                        {!! Form::text('seo_description', $categoria->seo_description, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>
                    
                    <div class="form-group col-6">
                        <label for="nombre">INGRESE NOMBRE</label>
                        {!! Form::text('nombre', $categoria->nombre, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>
                    
                    <div class="form-group col-6">
                        <br><label for="seo_image">SELECCIONE SEO_IMAGE</label><br>
                        <img class="border" style="width: 50mm" src={!! asset('img/categoria/' . $categoria->seo_image) !!}><br>
                        {!! Form::file('seo_image') !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <br><label for="descripcion">INGRESE DESCRIPCIÓN</label>
                        {!! Form::textarea('descripcion', $categoria->descripcion, [
                            'class' => 'form-control',
                            'maxlength' => '300',
                            'rows' => '6',
                        ]) !!}
                    </div>

                    <div class="form-group col-6">
                        <br> <label for="imagen">SELECCIONE IMAGEN</label> <br>
                        <img class="border" style="width: 50mm" src={!! asset('img/categoria/' . $categoria->imagen) !!}>
                        {!! Form::file('imagen') !!} <br>
                    </div>

                </div>
                <div class="col-1">
                    <div class="form-group text-align">
                        <a href="{{ route('categoria.index') }}">
                            <p class="text-start mt-2"> Regresar </p>
                        </a>
                    </div>


                    {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>
@endsection
