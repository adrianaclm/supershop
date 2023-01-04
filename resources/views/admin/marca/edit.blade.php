@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> MARCAS </h2>
                {!! Form::open(['route' => ['marca.update', $marca], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">

                    <div class="form-group col-sm-6">
                        <label for="nombre">INGRESE NOMBRE DE MARCA</label>
                        {!! Form::text('nombre', $marca->nombre, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="serial">INGRESE SERIAL</label>
                        {!! Form::text('serial', $marca->serial, ['class' => 'form-control']) !!} <br>
                    </div>
             
                    <div class="form-group col-6">
                        <label for="categoria_id">CATEGORIA ID</label>
                        <select name="categoria_id" class="form-control">

                            <option disabled selected>{{ $marca->categoria_id }} - Seleccionada</option>
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}" >{{ $c->id }} - {{ $c->nombre }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="urlfoto">INGRESE FOTO</label><br>
                        <img class="border" style="width: 100mm" src={!! asset('img/marca/' . $marca->urlfoto) !!} width="900px" height='auto'>
                        {!! Form::file('urlfoto') !!}
                    </div>
                </div>
                <div class="form-group text-right">
                    <br><a href="{{ route('marca.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div>

                <br> {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
