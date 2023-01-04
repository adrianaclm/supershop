@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> MODELOS </h2>
                {!! Form::open(['route' => ['modelo.update', $modelo], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">

                    <div class="form-group col-6">
                        <label for="codigo">INGRESE CODIGO DE MODELO</label>
                        {!! Form::text('codigo', $modelo->codigo, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="año">INGRESE AÑO</label>
                        {!! Form::text('año', $modelo->año, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="peso">INGRESE PESO</label>
                        {!! Form::text('peso', $modelo->peso, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="talla">INGRESE TALLA</label>
                        {!! Form::text('talla', $modelo->talla, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="tamaño">INGRESE TAMAÑO</label>
                        {!! Form::text('tamaño', $modelo->tamaño, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="color">INGRESE COLOR</label>
                        {!! Form::text('color', $modelo->color, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="cod_imei">INGRESE CODIGO IMEI</label>
                        {!! Form::text('cod_imei', $modelo->cod_imei, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6 mt-1">
                        <label for="garantia">¿POSEE GARANTIA?</label>
                        <select name="garantia" class="form-control" value={{ $modelo->garantia }}>
                            <option>{{ $modelo->garantia }}</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select><br>
                    </div>

                    <div class="form-group col-6">
                        <label for="tipo_garantia">INGRESE TIEMPO DE GARANTIA</label>
                        {!! Form::text('tipo_garantia', $modelo->tipo_garantia, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="marca_id">CATEGORIA ID</label>
                        <select name="marca_id" class="form-control">

                            <option disabled selected>{{ $modelo->marca_id }} - Seleccionada</option>
                            @foreach ($marcas as $c)
                                <option value="{{ $c->id }}">{{ $c->id }} - {{ $c->nombre }}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
                <div class="right">
                    {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!} <br>
                    {!! Form::close() !!}
                </div>

                <div class="form-group text-right">
                    <a href="{{ route('modelo.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
