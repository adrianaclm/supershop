<html>

<head>
    <title>Supershopep, CA</title>
</head>

<body>
    <a class="navbar-brand d d-md-block d-xl-block">
        <img src={!! asset('img/configuracion/' . $config->logo) !!} alt="" width="200" height="35"
        class="d-inline-block aling-text-top" />
    </a><br>

    <h1>@nombre , gracias por tu nueva compra. Tu pedido está confirmado. </h1><br>

    <h3>Nuestros vendedores se estarán comunicando contigo para coordinar la forma de pago.</h3>

    <h2>Resumen del pedido</h2><br>
    <div class="row row-no-gutters">

        <div class="col-6 col-lg-3">
        </div>
        <div class="col-6 col-lg-3">
            <p>
                <b>Cantidad: </b> <br>
                <b>Precio unit.: </b>$ <br>
                <b>IVA 16%: </b> $  <br>
                <b>Sub Total: </b> $ <br>

            </p>
        </div>

    </div>
    <hr>

    <p>Gracias</p>
</body>

</html>
