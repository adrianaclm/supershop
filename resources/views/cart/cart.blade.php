@extends('layouts.otro')

@section('content')
<div id="resumen" class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-2">
            <li class="breadcrumb-item"><a href="{{ url('/#') }}">Regresar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Resumen de Orden</li>
        </ol>
    </nav>

    @if(session()->has('success_msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success_msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('alert_msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('alert_msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  

    <div class="row justify-content-center">
        <div class="col-12 col-md-7 ">
            <br>
            @if(\Cart::getTotalQuantity()>0)
            <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
            @else
            <h4>Su carrito se encuentra vacío</h4><br>
            <a href="{{ url('/#') }}" class="btn btn-dark">Continúe en la tienda</a>
            @endif

            @foreach($cartCollection as $item)
            <div class="row">
                <div class="col-4 col-lg-3">
                    <img src="{{ asset('img/producto/' . $item->attributes->image)  }}" class="img-thumbnail" width="150" height="120">
                </div>
                <div class="col-4 col-lg-5">
                    <p>
                        <b><a href="{{ url('/tienda/descripcion/'.$item->id) }}">{{ $item->name }}</a></b><br>
                        <b>Precio unit.: </b>$ {{ $item->price }}<br>
                        <b>IVA 16%: </b> $ {{ ($item->price * $item->quantity) * 0.16 }} <br>
                        <b>Sub Total: </b> $ {{ \Cart::get($item->id)->getPriceSum() + (\Cart::get($item->id)->getPriceSum() * 0.16)  }}<br>

                        {{-- <b>With Discount: </b> $ {{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                    </p>
                </div>
                <div class="col-4 col-lg-4">
                    <div class="row">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" id="quantitys" name="quantity" style="width: 50px; margin-right: 2px;">
                                <button class="btn btn-secondary btn-sm" style="width: 50px; margin-right: 2px;"><i class="fa fa-edit"></i></button>
                            </div>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                            <button class="btn btn-danger btn-sm" style="width: 50px; margin-top:5px; margin-left: 40px"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @if(count($cartCollection)>0)
            <form action="{{ route('cart.clear') }}" class='col-4 pb-5' method="POST">
                @csrf
                <button class="btn btn-secondary btn-outline-dark btn-md">Vaciar Carrito</button>
            </form>
            @endif
        </div>
        @if(count($cartCollection)>0)
        <div class="col-10 col-lg-5 mt-5">
            <div class="card mt-5">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Total: </b>$ {{ \Cart::getSubTotal() + (\Cart::getSubTotal() * 0.16) }}</li>
                </ul>
            </div>
            <br><a href="{{ route('inicio') }}" class="btn btn-secondary mb-2">Continue en la tienda</a>


            <form method="POST" action="{{ route('card.procesar') }}" class="submit-prevent-form form-cedula">
                @csrf

                <div class="mt-5">
                    <label for="cedula" class="col-form-label"> {{ __('Cédula de Identidad: ') }} </label>

                    <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" autocomplete="name" minlength='7' maxlength='11' required placeholder="Ingrese cédula de identidad" autofocus />

                    @error('cedula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <br>
                <input type="submit" value="Procesar Pedido" class="btn btn-outline-danger mb-2 submit-prevent-button">


            </form><br>
        </div>
        @endif
    </div>
    <br><br>
</div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
@endsection

@section ('content')

<script>

    $('.form-cedula').submit(function(e){
        e.preventDefault();
    });
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
</script>

@endsection