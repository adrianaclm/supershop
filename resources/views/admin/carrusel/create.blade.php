@extends('layouts.app')

@section('content')
<div class="container-fluid col-sm-10">
    <div class="row">
        @include('admin.submenu')
        <div class="col-sm-10">

            <h2 class="text-center"> CARRUSEL </h2>
            {!! Form::open(['route'=>['carrusel.store'],'method'=>'POST','files'=>true]) !!}

            <div class="jumbotron">
               
        
                <div class="form-group">
                    <label for="link">INGRESE LINK</label>
                    {!! Form::text('link', null ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="order">INGRESE ORDEN</label>
                    {!! Form::text('order', null ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="image">IMAGEN</label> <br>
              
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