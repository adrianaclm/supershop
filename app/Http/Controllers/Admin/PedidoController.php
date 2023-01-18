<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\User;
use App\Models\Estado;
use Illuminate\Support\Facades\Session;

class PedidoController extends Controller
{
    public function index()
    {
       
        $pedidos = Pedido::paginate(10);
        $estado = Pedido::select('pedidos.id', 'pedidos.fecha', 'pedidos.estados_id','estados.nombre', 'users.id')
        ->join('estados', 'pedidos.estados_id', '=', 'estados.id')
        ->join('users', 'pedidos.cart_id', '=', 'users.coduser_id' )
        ->get();

       
        return view('admin.pedido.index', compact('pedidos', 'estado'));
    }

  
    public function store(Request $request)
    {

        $pedido = new Pedido($request->all());
        $pedido->save();
        return redirect('/admin/pedido');
    }

    public function update(Request $request, $id)
    {

        $pedido = Pedido::findOrFail($id);
        $pedido->fill($request->all());
            
        $pedido->save();
        return redirect('/admin/pedido');
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $user = User::select('users.name', 'users.address')
        ->join('pedidos', 'users.user_id', '=', 'pedidos.cart_id')
        ->where('pedidos.id', '=', $id)
        ->first();
        $productos = Detalle::select('productos.id', 'productos.nombre', 'detalles.cantidad', )
        ->join('productos', 'detalles.producto_id', '=', 'productos.id')
        ->where('detalles.pedido_id', '=', $id)->get();
        $sed = Pedido::select('pedidos.estados_id','estados.nombre')
        ->join('estados', 'pedidos.estados_id', '=', 'estados.id')
        ->where('pedidos.id', '=', $id)
        ->first();

        $estado = Estado::get();

        return view('admin.pedido.edit', compact('pedido', 'user', 'productos', 'estado', 'sed'));
    }

    public function show($id)
    {
        Session::put('pedido_id', $id);
        return redirect('/admin/pedido');
    }

  
}
