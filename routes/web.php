<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
    // ruta de usuario administrador    
   Route::resource('/configuracion', App\Http\Controllers\Admin\ConfiguracionController::class);
   Route::resource('/empresa', App\Http\Controllers\Admin\EmpresaController::class);

   //Route::resource('/user', App\Http\Controllers\Auth\RegisterController::class);
   //Route::resource('/detalle', DetalleController::class);
   //Route::get('/generarpdf/{id}', [UserController::class, "generarpdf"]);
   Route::resource('/categoria', App\Http\Controllers\Admin\CategoriaController::class);
   Route::resource('/producto', App\Http\Controllers\Admin\ProductoController::class);
   Route::resource('/carrusel', App\Http\Controllers\Admin\CarruselController::class);
   Route::resource('/proveedor', App\Http\Controllers\Admin\ProveedorController::class);
   Route::resource('/marca', App\Http\Controllers\Admin\MarcaController::class);
   Route::resource('/modelo', App\Http\Controllers\Admin\ModeloController::class);
   Route::resource('/pedido', App\Http\Controllers\Admin\PedidoController::class);
   
});

// rutas carro de compra

Route::get('/tienda', [App\Http\Controllers\CartController::class, 'shop'])->name('shop');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.store');
Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::post('/procesar', [App\Http\Controllers\CartController::class, 'proceso'])->name('card.procesar');


Route::any('/procesar/pedido', [App\Http\Controllers\Payments\FacturaController::class, 'index'])->name('card.confirmar');
Route::any('/procesar/facturacion/', [App\Http\Controllers\Payments\FacturaController::class, 'create'])->name('card.create');




//rutas públicas para usuario cliente

Route::group(['prefix' => 'cliente', 'middleware' => ['auth', 'role:cliente']], function () {
    // echo "cliente";  
});


Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('inicio');
Route::get('/{categoria:slug}', [App\Http\Controllers\FrontController::class, 'categoria'])->name('categoria');
//Route::get('tienda/productos/', [App\Http\Controllers\FrontController::class, 'productos'])->name('productos');
Route::get('/descripcion/{producto:id}', [App\Http\Controllers\FrontController::class, 'producto'])->name('producto');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//pagos paypal

Route::get('/tienda/cart/handle-payment', [App\Http\Controllers\Payments\PaymentPController::class, 'payment'])->name('payment');
Route::get('/tienda/cart/cancel-payment', [App\Http\Controllers\Payments\PaymentPController::class, 'cancelPayment'])->name('payment.cancel');
Route::get('/tienda/cart/payment-success', [App\Http\Controllers\Payments\PaymentPController::class, 'successPayment'])->name('payment.success');//


// payment
//Route::get('/paypal/{solution}', [App\Http\Controllers\Payments\PaymentController::class, 'create'])->name('payment');
// pagos paypal redirect
// Route::get('/paypal/pay/', [App\Http\Controllers\Payments\PaymentController::class, 'pay'])->name('paypal.pay');
// Route::get('/paypal/status/', [App\Http\Controllers\Payments\PaymentController::class, 'status'])->name('paypal.status');

// // paypal JS
// Route::get('/paypal/process/{orderId}', [App\Http\Controllers\Payments\PayPalCardController::class, 'process'])->name('paypal.process');
