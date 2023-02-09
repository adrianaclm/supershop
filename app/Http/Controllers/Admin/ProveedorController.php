<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;




class ProveedorController extends Controller
{
    public function index()
    {
        $proveedors = Proveedor::all();
        $proveedor = Proveedor::paginate(10);

        return view("admin.proveedor.index", compact('proveedors, proveedor'));
    }

    public function create()
    {
        return view('admin.proveedor.create');
    }

    public function store(Request $request)
    {

        $proveedor = new Proveedor($request->all());  
        $proveedor->save();
        return redirect('/admin/proveedor');
    }

    public function update(Request $request, $id)
    {

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->fill($request->all());
       
        $proveedor->save();
        return redirect('/admin/proveedor');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('admin.proveedor.edit', compact('proveedor'));
    }

    public function show($id)
    {
        Session::put('proveedor_id', $id);
        return redirect('/admin/producto');
    }
 
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
      
        $proveedor->delete();

        return redirect('/admin/proveedor');
    }
}
