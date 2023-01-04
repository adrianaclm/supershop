@extends('layouts.app')

@section('content')
<div class="container-fluid col-sm-10">
    <div class="row">
        @include('admin.submenu')
        <div class="col-sm-10">
            <h2 class="text-center"> CARRUSEL </h2>
            {!! Form::open(['route'=>['carrusel.update',$carrusel],'method'=>'PUT','files'=>true]) !!}

            <div class="jumbotron">
        
 
                <div class="form-group">
                    <label for="link">INGRESE LINK</label>
                    {!! Form::text('link', $carrusel->link ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="order">INGRESE ORDEN</label>
                    {!! Form::text('order', $carrusel->order ,['class'=>'form-control']) !!}
                </div>


                <div class="form-group col-sm-4">
                    <label for="image">INGRESE FOTO PARA EL CARRUSEL</label>
                    <img src={!! asset('img/carrusel/'. $carrusel->image) !!} >
                    {!! Form::file('image') !!}
                </div>          


       
                <div class="form-group text-right">
                    <a href="{{ route('carrusel.index') }}"> <p class="text-start"> Regresar </p> </a>
                </div>      

            </div>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection