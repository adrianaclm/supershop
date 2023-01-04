@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> MARCAS </h2>
                {!! Form::open(['route' => 'marca.store', 'method' => 'POST', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">

                    <div class="form-group col-sm-6">
                        <label for="nombre">INGRESE NOMBRE DE MARCA</label>
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="serial">INGRESE SERIAL</label>
                        {!! Form::text('serial', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="categoria_id">CATEGORIA A LA QUE PERTENECE</label>
                        <select name="categoria_id" class="form-control">
                            <option disabled selected>Seleccione una</option>
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}">{{ $c->id }} - {{ $c->nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>

                    <div class="form-group col-6">
                        <label for="urlfoto">INGRESE FOTO</label>
                        {!! Form::file('urlfoto') !!}
                    </div>


                </div>
                <div class="form-group text-right">
                    <br><a href="{{ route('marca.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a> <br>
                </div>
                {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
