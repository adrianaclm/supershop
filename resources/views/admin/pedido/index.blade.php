@extends('layouts.app')

@section('content')
<div class="container-fluid col-sm-10">
    <div class="row">
        @include('admin.submenu')
        <div class="col-sm-10">
            <h2 class="text-center"> PEDIDOS </h2>

            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a></a>
                    <form class="d-flex" role="search">
                        <input class="form-control" name="q" type="text" placeholder="Buscar .." value="{{ $q }}" />
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>
            </nav>

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
                        <td>{{ $item->uid}} </td>
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

            @if($pedidos->hasPages())
            <div class="card-footer">
                {{ $pedidos->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection