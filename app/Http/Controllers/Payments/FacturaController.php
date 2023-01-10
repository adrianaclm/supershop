<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FacturaController extends Controller
{
    public function create(Request $data)
    {
        Session::put('sessi', csrf_token());

        //$productos = Pedido::where(Session::get('cedula'))->get();

        $pedido = Pedido::get();

        $user = User::create([
            'name'      => $data['name'],
            'lastname'  => $data['lastname'],
            'cedula'    => $data[Pedido::where(Session::get('cedula'))->get()],
            'email'     => $data['email'],
            'telefono'  => $data['telefono'],
            'address'   => $data['address'],
        ]);

        return view('cart.checkout')->with(compact('user', 'pedido'));
    }



    public function validator(array $data)
    {

        $validator = Validator::make($data, [
            'name'      => ['required, string, min:3, max:20'],
            'lastname'  => ['required, string, min:3, max:20'],
            'email'     => ['required, string, email, max:50'],
            'telefono'  => ['required, regex:/^([0-9\s\-\+\(\)]*)$/, min:11, max:11'],
            'address'   => ['required, string, max:150'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else{

            // SEND EMAIL
            $this->sendNotification($data);

            return redirect()
                ->back()
                ->with('success', trans('web.contact_form_send'));
        }
        

        return view('card.confirmar')->with(['user' => $user]);
    }
}
