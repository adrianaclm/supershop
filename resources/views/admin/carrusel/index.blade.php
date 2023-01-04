@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.submenu')
        <div class="col-sm-10">
            <h2 class="text-center"> CARRUSEL </h2>
            <div class="mead">
                <a href="{{route('carrusel.create')}}" class="meod btn btn-danger">NUEVO</a>
            </div><br>
            <table class="table table-striped bg-light">
                <thead>
                    <th>ORDEN</th>
                    <th>IMAGEN</th>                
                    <th>ACCION</th>
                </thead>
                <tbody>
                    @forelse ($carrusels as $item)
                    <tr>
                        <td>{{$item->order}}</td>
                        <td><img src={!! asset('img/carrusel/'. $item->image) !!} width="300"></td>
                        <td class="meod">
                            <a href="{{ route('carrusel.edit',$item->id)}}" class="btn btn-danger">EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['carrusel.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('ELIMINAR',['class'=>'btn btn-danger','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
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