<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Mail\OrdenCreada;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Darryldecode\Cart\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;


class FacturaController extends Controller
{

    public function index()
    {

        $cartCollection = \Cart::getContent();
        $sesion = csrf_token();
        $pedido = Pedido::get()->where('cart_id', $sesion)->first();

        return view('cart.checkout')->with(compact('cartCollection', 'pedido'));
    }

    public function create(Request $request)
    {
        $_SESSION = csrf_token();

        $pedido = Pedido::get()->where('cart_id', $_SESSION)->first();

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

        $user = new User();
        $user->name = strtoupper($request->input('name'));
        $user->lastname = strtoupper($request->input('lastname'));
        $user->cedula = Pedido::where('cart_id', '=', $_SESSION)->pluck('cedula')->first();
        $user->email = strtoupper($request->input('email'));
        $user->address = strtoupper($request->input('address'));
        $user->telefono = strtoupper($request->input('telefono'));
        $user->coduser_id = csrf_token();

        Mail::to($user->email)->send(new OrdenCreada($pedido));

        $user->save();
        \Cart::clear();
        session()->regenerate();

        Alert::success('Pedido Procesado', 'Información enviada a su correo');

        return redirect()->route('inicio');
    }
}
