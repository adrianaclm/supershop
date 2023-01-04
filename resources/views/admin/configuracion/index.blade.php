@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> CONFIGURACION </h2><br>
                {!! Form::open(['route' => ['configuracion.update', $config], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start"> 
                    <div class="form-group ">
                        <label for="seo_title">INGRESE TITULO</label>
                        {!! Form::text('seo_title', $config->seo_title, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group ">
                        <label for="seo_description">INGRESE DESCRIPCION</label>
                        {!! Form::textarea('seo_description', $config->seo_description, [
                            'class' => 'form-control', 'maxlength' => '200', 'rows' => '5'
                        ]) !!} <br>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="seo_image">IMAGEN DESTACADA </label> <br>
                        
                        <img src={!! asset('img/configuracion/'. $config->seo_image ) !!} width="300"> <br>
                        {!! Form::file('seo_image') !!} <br>
                    </div>                      <br>
                
                    <div class="form-group col-sm-4">
                        <label for="favicon">FAVICON</label> <br>
                        <img src={!! asset('img/configuracion/'. $config->favicon ) !!} width="300"> <br>
                        {!! Form::file('favicon') !!} <br>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="logo">LOGO</label> <br>
                        <img src={!! asset('img/configuracion/'. $config->logo ) !!} width="300"> 
                        {!! Form::file('logo') !!} <br>
                    </div>               
                
                    <div class="col-sm-12">
                     <br>   <label for="slogan">SLOGAN</label> 
                        {!! Form::text('slogan', $config->slogan, ['class' => 'form-control', 'maxlength' => '150']) !!} <br>
                    </div>
          
                </div>

                <div class="col-1">
                    {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </div>                

            </div>
        </div>
    </div>



@endsection