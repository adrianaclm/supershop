@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> MODELOS </h2>
                {!! Form::open(['route' => ['modelo.store'], 'method' => 'POST', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">

                    <div class="form-group col-6">
                        <label for="codigo">INGRESE CODIGO DE MODELO</label>
                        {!! Form::text('codigo', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="año">INGRESE AÑO</label>
                        {!! Form::text('año', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="peso">INGRESE PESO</label>
                        {!! Form::text('peso', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="talla">INGRESE TALLA</label>
                        {!! Form::text('talla', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="tamaño">INGRESE TAMAÑO</label>
                        {!! Form::text('tamaño', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="color">INGRESE COLOR</label>
                        {!! Form::text('color', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="cod_imei">INGRESE CODIGO IMEI</label>
                        {!! Form::text('cod_imei', null, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group col-6 mt-1">
                        <label for="garantia">¿POSEE GARANTIA?</label>
                
                        <select name="garantia" class="form-control">
                            <option>Seleccione una opción</option>
                            <option value="1">SI</option>
                            <option value="0">NO</option>
                        </select><br>
                    </div>

                    <div class="form-group col-6">
                        <label for="tipo_garantia">INGRESE TIEMPO DE GARANTIA</label>
                        {!! Form::text('tipo_garantia', null, ['class' => 'form-control', 'maxlength' => '67']) !!} <br>
                    </div>


                    <div class="form-group col-6">
                        <label for="marca_id">MARCA A LA QUE PERTENECE</label>
                        <select name="marca_id" class="form-control">
                            <option disabled selected>Seleccione una</option>
                            @foreach ($marcas as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select><br>
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
