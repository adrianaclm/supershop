@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> PROVEEDORES </h2><br>
                {!! Form::open(['route' => ['proveedor.update', $proveedor], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron text-start row bg-light m-2">

                    <div class="form-group col-6">
                        <label for="razon_social">INGRESE RAZON SOCIAL</label>
                        {!! Form::text('razon_social', $proveedor->razon_social, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="RIF">INGRESE RIF</label>
                        {!! Form::text('RIF', $proveedor->RIF, ['class' => 'form-control']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="telefono">INGRESE TELEFONO</label>
                        {!! Form::text('telefono', $proveedor->telefono, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="correo">INGRESE CORREO ELECTRONICO</label>
                        {!! Form::text('correo', $proveedor->correo, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="direccion">INGRESE DIRECCION</label>
                        {!! Form::text('direccion', $proveedor->direccion, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="nro_cuenta">INGRESE NRO DE CUENTA</label>
                        {!! Form::text('nro_cuenta', $proveedor->nro_cuenta, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>

                    <div class="form-group col-6">
                        <label for="banco">INGRESE BANCO</label>
                        {!! Form::text('banco', $proveedor->banco, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div><br>




                </div><br>


                <div class="form-group text-right">
                    <a href="{{ route('proveedor.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div>
                {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
