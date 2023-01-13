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


class FacturaController extends Controller
{
 
    public function index()
    {
        $cartCollection = \Cart::getContent();
        $pedido = Pedido::get('id')->last();

        return view('cart.checkout')->with(compact('cartCollection', 'pedido'));
    }

    public function create(Request $request, $pedido)
    {
        $cart_id = Pedido::get('cart_id');

        if ($cart_id = csrf_token()) {
            $user = new User();
            $user->name = strtoupper($request->input('name'));
            $user->lastname = strtoupper($request->input('lastname'));
            $user->cedula = Pedido::getActual('cedula');  
            $user->email = strtoupper($request->input('email'));
            $user->address = strtoupper($request->input('address'));
            $user->telefono = strtoupper($request->input('telefono'));
            $user->save();
        }else{
            session()->regenerate();
            \Cart::clear();

        };

        $cartCollection = \Cart::getContent();


        // $validator = Validator::make($request->all(), [
        //     'name'      => ['required', 'string', 'min:3', 'max:20'],
        //     'lastname'  => 'required| string| min:3| max:20',
        //     'email'     => 'required| string| email| max:50',
        //     'telefono'  => 'required| regex:/^[](0-9\s\-\+\(\)]*)$/| min:11| max:11',
        //     'address'   => 'required| string| max:150',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->withErrors($validator->errors());
        // } else {

        //     // SEND EMAIL
        //     $this->sendNotification($data);

        //     return redirect()
        //         ->back()
        //         ->with('success' | trans('web.contact_form_send'));
        // }



        //$user->create($request->all());
        //$users = User::all();

        return view('cart.successpay')->with(compact('user', 'pedido', 'id', 'cartCollection'));


        //return redirect()->route('card.confirmar')->with(compact('user', 'pedido', 'cartCollection'));
    }



    public function validator(array $data)
    {

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

        $cartCollection = \Cart::getContent();

        return view('card.confirmar')->with(compact('user', 'cartCollection'));
    }
}