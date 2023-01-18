@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> PEDIDOS </h2>
                {!! Form::open(['route' => ['pedido.update', $pedido], 'method' => 'PUT']) !!}

                <table class="table table-striped bg-light">
                    <thead>
                        <th># PEDIDO</th>
                        <th>ID - NOMBRE USUARIO</th>
                        <th>DIRECCION</th>                      
                    </thead>              

                    <tbody>
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $user->id }} - {{ $user->name}} {{ $user->lastname}}</td>
                            <td>{{ $user->address}}  </td>
                        </tr>
                    </tbody>
                    
                    <thead>
                        <th>ARTICULO</th>
                        <th>CANTIDAD</th>
                        <th>ACCION</th>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td>
                                @foreach ($productos as $item)
                                    {{ $item->id }} - {{ $item->nombre}}<br>
                                @endforeach
                            </td>
                            
                            <td>
                                @foreach ($productos as $item)
                                    {{ $item->cantidad }} <br>
                                @endforeach
                            </td>
                            
                            <td>
                            {{ $sed->estados_id }} - {{ $sed->nombre }}
                            <select name="estados_id" class="form-control">
                                <option disabled selected> Seleccione una para cambiar </option>

                            @foreach ($estado as $p)
                               
                                <option value="{{ $p->id }}" > {{ $p->id}} - {{ $p->nombre }} </option>
                            @endforeach
                        </select>
                            </td>
                        </tr>


                    </tbody>
                </table>









                <div class="form-group text-right">
                    <a href="{{ route('pedido.index') }}">
                        <p class="text-start"> Regresar </p>
                    </a>
                </div>


                {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    
@endsection
