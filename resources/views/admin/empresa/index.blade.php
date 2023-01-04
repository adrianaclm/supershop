@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> DATOS EMPRESA </h2><br>
                {!! Form::open(['route' => ['empresa.update', $registro], 'method' => 'PUT', 'files' => true]) !!}

                <div class="jumbotron row bg-light text-start">
                    <div class="col-sm-6 ">
                        <label for="razonSocial">INGRESE RAZON SOCIAL</label>
                        {!! Form::text('razonSocial', $registro->razonSocial, ['class' => 'form-control', 'maxlength' => '67']) !!}
                    </div>

                    <div class="col-sm-6">
                        <label for="rif">INGRESE RIF</label>
                        {!! Form::text('rif', $registro->rif, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="form-group">
                        <label for="direccion">INGRESE DIRECCION</label>
                        {!! Form::text('direccion', $registro->direccion, ['class' => 'form-control']) !!} <br>
                    </div>

                    <div class="col-sm-6">
                        <label for="celular">NUMERO CELULAR</label>
                        {!! Form::text('celular', $registro->celular, ['class' => 'form-control', 'maxlength' => '200']) !!}
                    </div>

                    <div class="col-sm-6">
                        <label for="email">CORREO ELECTRONICO</label>
                        {!! Form::text('email', $registro->email, ['class' => 'form-control', 'maxlength' => '200']) !!} <br>
                    </div>

                    <div class="col-sm-6">
                        <label for="facebook">DIRECCION FACEBOOK</label>
                        {!! Form::text('facebook', $registro->facebook, ['class' => 'form-control', 'maxlength' => '200']) !!}
                    </div>

                    <div class="col-sm-6">
                        <label for="instagram">DIRECCION INSTAGRAM</label>
                        {!! Form::text('instagram', $registro->instagram, ['class' => 'form-control', 'maxlength' => '200']) !!}<br>
                    </div>

                    <div class="col-sm-8 mt-1 mb-2">
                        <label for="somos">MENSAJE SOMOS</label>
                        {!! Form::textarea('somos', $registro->somos, ['class' => 'form-control', 'maxlength' => '200', 'rows' => '5']) !!}
                    </div>

                    <div class="col-sm-4 mt-1 mb-2">
                        <label for="urlsomos">FOTO SOMOS</label> <br>
                        <img src={!! asset('img/empresa/' . $registro->urlsomos) !!} width="200px" height='200px'>
                        {!! Form::file('urlsomos') !!}
                    </div><br>

                    <div class="col-sm-8 mt-1 mb-2">
                        <label for="historia">MENSAJE HISTORIA</label>
                        {!! Form::textarea('historia', $registro->historia, [
                            'class' => 'form-control',
                            'maxlength' => '200',
                            'rows' => '5',
                        ]) !!}
                    </div>

                    <div class="col-sm-4 mt-1 mb-2">
                        <label for="urlhistoria">FOTO HISTORIA</label> <br>
                        <img src={!! asset('img/empresa/' . $registro->urlhistoria) !!} width="200px" height='200px'>
                        {!! Form::file('urlhistoria') !!}
                    </div> <br>

                    <div class="col-sm-8">
                        <label for="mision">MENSAJE MISION</label>
                        {!! Form::textarea('mision', $registro->mision, [
                            'class' => 'form-control',
                            'maxlength' => '200',
                            'rows' => '5',
                        ]) !!}
                    </div>

                    <div class="col-sm-4 mt-1 mb-2">
                        <label for="urlmision">FOTO MISION</label> <br>
                        <img src={!! asset('img/empresa/' . $registro->urlmision) !!} width="200px" height='200px'>
                        {!! Form::file('urlmision') !!}
                    </div>

                    <div class="col-sm-8 mt-1 mb-2">
                        <label for="vision">MENSAJE VISION</label>
                        {!! Form::textarea('vision', $registro->vision, [
                            'class' => 'form-control',
                            'maxlength' => '200',
                            'rows' => '5',
                        ]) !!}
                    </div>

                    <div class="col-sm-4 mt-1 mb-2">
                        <label for="urlvision">FOTO VISION</label> <br>
                        <img src={!! asset('img/empresa/' . $registro->urlvision) !!} width="200px" height='200px'>
                        {!! Form::file('urlvision') !!}
                    </div>

                    <div class="col-sm-8 mt-1 mb-2">
                        <label for="valores">MENSAJE VALORES</label>
                        {!! Form::textarea('valores', $registro->valores, [
                            'class' => 'form-control',
                            'maxlength' => '200',
                            'rows' => '5',
                        ]) !!}
                    </div>

                    <div class="col-sm-4">
                        <label for="urlvalores mt-1 mb-2">FOTO VALORES</label> <br>
                        <img src={!! asset('img/empresa/' . $registro->urlvalores) !!} width="200px" height='200px'>
                        {!! Form::file('urlvalores') !!}
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
