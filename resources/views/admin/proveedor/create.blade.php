@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">

                <h2 class="text-center"> PROVEEDORES </h2>
                {!! Form::open(['route' => ['proveedor.store'], 'method' => 'POST', 'files' => true]) !!}

                <div class="jumbotron text-start row bg-light mb-2">

                    <div class="form-group col-6">
                        <label for="razon_social">INGRESE RAZON SOCIAL</label>
                        {!! Form::text('razon_social', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="RIF">INGRESE RIF</label>
                        {!! Form::text('RIF', null, ['class' => 'form-control']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="telefono">INGRESE TELEFONO</label>
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="correo">INGRESE CORREO ELECTRONICO</label>
                        {!! Form::text('correo', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="direccion">INGRESE DIRECCION</label>
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="nro_cuenta">INGRESE NRO DE CUENTA</label>
                        {!! Form::text('nro_cuenta', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="banco">INGRESE BANCO</label>
                        {!! Form::text('banco', null, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>




                </div>

                <div class="form-group text-right mt-2">
                    <a href="{{ route('proveedor.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div><br>
                {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('RIF');
    </script>
@endsection
