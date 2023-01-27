<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Darryldecode\Cart\Cart;

class FacturaController extends Controller{
 
    public function index()
    {
        $cartCollection = \Cart::getContent();
        $sesion = csrf_token();
        $pedido = Pedido::get()->where('cart_id', $sesion)->first();

        return view('cart.checkout')->with(compact('cartCollection', 'pedido'));
    }

    public function create(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required| string| min:3| max:20',
            'lastname'  => 'required| string| min:3| max:20',
            'email'     => 'required| string| email| max:50',
            'telefono'  => 'required| min:11| max:11',
            'address'   => 'required| string| max:150',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        };

        $sesion = csrf_token();

        if (Pedido::where('cart_id', $sesion)->exists()){

        //     $pedido = Pedido::findOrFail($_SESSION);
        //     $pedido->fill($request->all());
        //     $pedido->save();
        session()->regenerate();
            
        return redirect()->route('inicio');

        }else{   

            $user = new User();
            $user->name = strtoupper($request->input('name'));
            $user->lastname = strtoupper($request->input('lastname'));
            $user->cedula = Pedido::where('cart_id', '=', $_SESSION)->pluck('cedula')->first();  
            $user->email = strtoupper($request->input('email'));
            $user->address = strtoupper($request->textarea('address'));
            $user->telefono = strtoupper($request->input('telefono'));
            $user->coduser_id = csrf_token();
            $user->save();
        };

        \Cart::clear();
        session()->regenerate();

        return view('cart.successpay');
//        ->with(compact('user', 'pedido', 'id', 'cartCollection'));


        //return redirect()->route('card.confirmar')->with(compact('user', 'pedido', 'cartCollection'));
    }
}



        //$validator = Validator::make($data, [
        // 'name'      => 'required| string| min:3| max:20',
        // 'lastname'  => 'required| string| min:3| max:20',
        // 'email'     => 'required| string| email| max:50',
        // 'telefono'  => 'required| regex:/^(0-9\s\-\+\(\)]*)$/| min:11| max:11',
        // 'address'   => 'required| string| max:150',
        //]);

        //if ($validator->fails()) {
        //    return back()->withErrors($validator);
        //} else {

        // SEND EMAIL
        //    $this->sendNotification($data);

        //    return redirect()
        //        ->back()
        //        ->with('success' | trans('web.contact_form_send'));
        //}

        // $cartCollection = \Cart::getContent();

        // return view('card.verificar')->with(compact('user', 'cartCollection'));
    

