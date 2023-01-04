@extends('layouts.app')

@section('content')
    <div class="container-fluid col-sm-10">
        <div class="row">
            @include('admin.submenu')
            <div class="col-sm-10">
                <h2 class="text-center"> MODELOS </h2>
                <div class="mead">
                    <a href="{{ route('modelo.create') }}" class="btn btn-danger">NUEVO</a> 
                </div><br>
                <table class="table table-striped bg-light">
                    <thead>
                        <th>ID</th>
                        <th>CODIGO</th>
                        <th>ID MARCA</th>
                        <th>ACCION</th>
                    </thead>
                    <tbody>
                        @forelse ($modelos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td class="mead">{{ $item->codigo }}</td>
                                <td >{{ $item->marca_id }}</td>
                                <td class="meod">
                                    
                                     <a href="{{ route('modelo.edit', $item->id) }}" class="btn btn-danger">EDITAR</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['modelo.destroy', $item->id], 'style' => 'display:inline']) !!}
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