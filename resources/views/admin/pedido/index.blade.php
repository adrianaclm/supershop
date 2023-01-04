@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> PEDIDOS </h2>
               <br>
                <table class="table table-striped bg-light">
                    <thead>
                        <th>ID</th>
                        <th>ID USUARIO</th>
                        <th>FECHA PEDIDO</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </thead>
                    <tbody>
                        @forelse ($estado as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user_id}} </td> 
                                <td>{{ $item->fecha }}</td>
                                <td>{{ $item->estados_id }} - {{ $item->nombre }}</td>
                                <td>
                                    
                                    <a href="{{ route('pedido.edit', $item->id) }}" class="btn btn-danger">VER DETALLE</a>
                                  
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {!! $pedidos->withQueryString()->links('pagination::bootstrap-5') !!}

            </div>

        </div>
    </div>
@endsection
