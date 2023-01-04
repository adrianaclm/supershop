@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> PROVEEDORES </h2>
                <div class="mead">
                    <a href="{{ route('proveedor.create') }}" class="btn btn-danger ">NUEVO</a>
                </div><br>
                <table class="table table-striped bg-light">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ACCION</th>
                    </thead>
                    <tbody>
                        @forelse ($proveedors as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td class="mead">{{ $item->razon_social }}</td>
                                <td class="meod">
                              
                                    <a href="{{ route('proveedor.edit', $item->id) }}" class="btn btn-danger">EDITAR</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['proveedor.destroy', $item->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('ELIMINAR', [
                                        'class' => 'btn btn-danger',
                                        'onclick' => 'return confirm("ESTA SEGURO DE ELIMINAR")',
                                    ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>

                </table>

                
            </div>
        </div>
    </div>
@endsection