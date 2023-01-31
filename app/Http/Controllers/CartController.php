<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Detalle;
use App\Models\Producto;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCollection;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    /*public function add(Request $request){
        $producto = Producto::find($request->id);
        Cart::add(array(
            "id" => $producto->id,
            "name" => $producto->name,
            "price" => $producto->precio,
            "quantity" => 1,
            "attributes" => array(
                "image" => $producto->image,
                "slug" => $producto->slug
                )
            ));
        return redirect()->back()->with("success_message", "Producto $producto->name agregado!");
    }

    public function cart(){
        return view('front.cart');
    }

    public function removeitem(Request $request){
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with("success", "Producto $producto->nombre eliminado con éxito de su carrito!");
    }

    public function clear(){
        Cart::clear();
        return back()->with("success", "Carrito de compra vacio!");
    }

    public function proceso(){

        if(Cart::getContent()->count()>0){
            $pedido = new Pedido();
            $pedido->subtotal = Cart::getSubTotal();
            $pedido->impuesto = Cart::getSubTotal() * 0.16;
            $pedido->total = Cart::getTotal() + Cart::getSubTotal() * 0.16;

            $pedido->entregado = 1;
            $pedido->user_id = Auth::user()->id;
            $pedido->save();

            $string="";
            foreach(Cart::getContent() as $c){
                $detalle = new Detalle();
                $detalle->cantidad =$c->quantity;
                $detalle->preciototal =$c->price * $c->quantity;
                $detalle->pedido_id =$pedido->id;
                $detalle->producto_id =$c->id;
                $detalle->save();

                $string .= "Producto: ".$c->nombre;
                $string .= "Cantidad: ".$c->quantity;
                $string .= "Precio: ".$c->price." | ";                

            }

            Cart::clear();

            $string .="SUBTOTAL:".$pedido->subtotal ." | ";
            $string .="IMPUESTO:".$pedido->impuesto ." | ";
            $string .="TOTAL:".$pedido->total ." | ";
            $string .="CLIENTE:".Auth::user()->name;
            
            echo "<script>window.location.href='https://api.whatsapp.com/send?phone=584122189082&text=Quiero%20'</script>";
        
        }else{
            return redirect()->back();
        }
    }**/

    public function shop()
    {
        $productos = Producto::all();

        $cartCollection = \Cart::getContent();

        //dd($productos);
        return view('shop')->with(compact('productos', 'cartCollection'));
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart.cart')->with(compact('cartCollection'));
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);

        return redirect()->route('cart.index')->with('alert_msg', '¡Producto removido de su carrito!');
    }

    public function add(Request $request)
    {
        //$value = $request->flash('key');
        //put('cart', $request->post('cart'));

        $producto = Producto::find($request->id);

        \Cart::add(array(
            "id" => $producto->id,
            "name" => $producto->nombre,
            "price" => $producto->pvp_detal,
            "quantity" => 1,
            "attributes" => array(
                "image" => $producto->image,
                "slug" => $producto->slug
            )
        ));
        return redirect()->back()->with("success_message", "¡$producto->nombre agregado al carrito!");
    }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', '¡Su carrito ha sido actualizado!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', '¡Todos los productos han sido removidos!');
    }

    public function proceso(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'cedula'      => 'required | min:6 | max:11',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        $sesion =csrf_token();
        // $sesion = Pedido::select('cart_id')
        // ->where('cart_id', $_SESSION)
        // ->get();
        while (count((Pedido::where('cart_id', $sesion)->get())) >= 1){
            
            session()->regenerate();
            return redirect('/cart');            
        }

        if ((\Cart::getContent()->count() > 0)){

            $pedido = new Pedido();
            $pedido->subtotal = \Cart::getSubTotal();
            $pedido->impuesto = \Cart::getSubTotal() * 0.16;
            $pedido->total = \Cart::getTotal() + \Cart::getSubTotal() * 0.16;
            $pedido->fecha = now();
            $pedido->cedula = strtoupper($request->input('cedula'));
            $pedido->estados_id = 1;
            $pedido->cart_id = csrf_token();
            //$pedido->user_id = Auth::user()->id;
            $pedido->save();
            //$productos = Pedido::where(Session::get('cedula'))->get();
            $string = "";

            foreach (\Cart::getContent() as $c) {
                $detalle = new Detalle();
                $detalle->cantidad = $c->quantity;
                $detalle->preciototal = $c->price * $c->quantity;
                $detalle->pedido_id = $pedido->id;
                $detalle->producto_id = $c->id;
                $detalle->created_at = now();
                $detalle->save();
            }
            //\Cart::clear();
            //return redirect()->back()->with('success_msg', '¡Su pedido está siendo procesado!');
            //echo "<script>window.location.href='https://api.whatsapp.com/send?phone=584122189082&text=Quiero%20información%20sobre%20mi%20compra'</script>";
            $cartCollection = \Cart::getContent();
        }

        return redirect()
        ->route('card.confirmar')
        ->with(compact('cartCollection', 'pedido'));

    }
}
