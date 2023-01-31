@extends('layouts.otro')

@section('content')


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle de pago</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <div class="py-3 py-md-4 checkout">

        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ back() }}">Regresar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Resumen de Orden</li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle de Compra</li>
                    <li class="breadcrumb-item active" aria-current="page">Nro. Pedido: {{ $pedido->id }} </li> <!--  comparar con session -->
                </ol>

            </nav>

            <hr>

            <div class="row">

                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Monto total a pagar :
                            <span class="float-end"> $ {{ \Cart::getSubTotal() + (\Cart::getSubTotal() * 0.16) }} </span>
                        </h4>
                        <hr>

                        @foreach($cartCollection as $item)
                        <div class="row row-no-gutters">

                            <div class="col-6 col-lg-3">
                                <img src="{{ asset('img/producto/' . $item->attributes->image)  }}" class="img-thumbnail" width="180" height="150">
                            </div>
                            <div class="col-6 col-lg-3">
                                <p>
                                    <b><a href="{{ url('/tienda/descripcion/'.$item->id) }}">{{ $item->name }}</a></b><br>
                                    <b>Cantidad: </b> {{ $item->quantity }}<br>
                                    <b>Precio unit.: </b>$ {{ $item->price }}<br>
                                    <b>IVA 16%: </b> $ {{ ($item->price * $item->quantity) * 0.16 }} <br>
                                    <b>Sub Total: </b> $ {{ \Cart::get($item->id)->getPriceSum() + (\Cart::get($item->id)->getPriceSum() * 0.16)  }}<br>

                                    {{-- <b>With Discount: </b> $ {{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                                </p>
                            </div>

                        </div>
                        <hr>
                        @endforeach
                        <small>* Retiro en tienda inmediato.</small>
                        <br />
                        <small>* Impuesto ya incluido.</small>
                    </div>
                </div>


                <div class="col-md-12 mb-3">
                    <label>Seleccione Método de Pago: </label>

                    <div class="d-md-flex align-items-start">
                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Pago a la Entrega</button>
                            <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Pago en Línea</button>
                        </div>
                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                <h6>Pago a la entrega</h6>
                                <hr>

                                <div class="col-md-12">
                                    <div class="shadow bg-white p-3">
                                        <h4 class="text-primary">
                                            Información de Facturación
                                        </h4>
                                        <hr>

                                        <form method="post" action="{{ route('card.create') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="name" class="col-form-label"> {{ __('Nombre: ') }} </label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" maxlength='20' required placeholder="Ingrese nombre" autofocus />

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="lastname" class="col-form-label"> {{ __('Apellido: ') }} </label>
                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" maxlength='20' required placeholder="Ingrese apellido" autofocus />

                                                    @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="email" class="col-form-label"> {{ __('Correo Electrónico: ') }} </label>
                                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" maxlength='50' required placeholder="Ingrese correo electrónico" autofocus />

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="telefono" class="col-form-label"> {{ __('Teléfono: ') }} </label>
                                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required placeholder="Ingrese número telefónico" autofocus />

                                                    @error('telefono')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="address" class="col-form-label"> {{ __('Dirección: ') }} </label>
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required placeholder="Ingrese dirección fiscal" autofocus />

                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <input type="submit" value="Procesar Orden (Retiro en tienda)" class="btn btn-primary col-md-12 mb-3">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                <h6>Método de pago en línea</h6>
                                <hr>

                                <div class="shadow bg-white p-3">
                                    <h4 class="text-primary">
                                        Información de Facturación
                                    </h4>
                                    <hr>
                                    <form method="post" action="{{ route('card.create') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label"> {{ __('Nombre: ') }} </label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" maxlength='20' required placeholder="Ingrese nombre" autofocus />

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastname" class="col-form-label"> {{ __('Apellido: ') }} </label>
                                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" maxlength='20' required placeholder="Ingrese apellido" autofocus />

                                                @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="col-form-label"> {{ __('Correo Electrónico: ') }} </label>
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" maxlength='50' required placeholder="Ingrese correo electrónico" autofocus />

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="telefono" class="col-form-label"> {{ __('Teléfono: ') }} </label>
                                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required placeholder="Ingrese número telefónico" autofocus />

                                                @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="address" class="col-form-label"> {{ __('Dirección: ') }} </label>
                                                <input id="address" row="5" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Ingrese dirección fiscal" autofocus />

                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </form>

                                    <div id="paypal-button-container" class="ms-4"></div>
                                    <!-- Sample PayPal credentials (client-id) are included -->
                                    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_API_SECRET') }}&currency={{ env('PAYPAL_CURRENCY') }}" data-sdk-integration-source="integrationbuilder"></script>
                                    <script>
                                        const paypalButtonsComponent = paypal.Buttons({

                                            // optional styling for buttons
                                            // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
                                            style: {
                                                color: "gold",
                                                shape: "rect",
                                                layout: "vertical",
                                                label: "pay"

                                            },

                                            // set up the transaction
                                            createOrder: (data, actions) => {
                                                // pass in any options from the v2 orders create call:
                                                // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                                                const createOrderPayload = {

                                                    application_context: {
                                                        shipping_preference: "NO_SHIPPING"
                                                    },

                                                    purchase_units: [{
                                                        amount: {
                                                            value: "{{ \Cart::getSubTotal() + (\Cart::getSubTotal() * 0.16) }}"
                                                        }
                                                    }]
                                                };

                                                return actions.order.create(createOrderPayload);
                                            },

                                            // finalize the transaction
                                            onApprove: function(data, actions) {
                                                return fetch('/paypal/process/' + data.orderID)
                                                    .then(res => res.json())
                                                    .then(function(response) {

                                                        // Show a failure message
                                                        if (!response.success) {
                                                            const failureMessage = 'Sorry, your transaction could not be processed.';
                                                            alert(failureMessage);
                                                            return;
                                                        }

                                                        processSuccessfulPayment(response);
                                                        location.href = response.url;
                                                    });
                                            }
                                        }).render("#paypal-button-container");
                                    </script>
                                </div>
                                <!--<a href="{{ route('payment') }}"><button type="button" class="btn btn-warning">Procesar Orden (Paypal)</button></a>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>


@endsection