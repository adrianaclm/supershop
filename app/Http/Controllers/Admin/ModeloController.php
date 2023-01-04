<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\Modelo;
use Illuminate\Support\Facades\Session;



class ModeloController extends Controller
{
    
    public function index()
    {
        //if(!empty(Session::get('marca_id'))){
        //    $modelos = Modelo::whereMarca_id(Session::get('marca_id'))->get();
        $modelos = Modelo::all();    
        return view("admin.modelo.index", compact('modelos'));
    }

    public function create()
    {
        $marcas = Marca::get();
        return view('admin.modelo.create', compact('marcas'));
    }

    public function store(Request $request)
    {

        $modelo = new Modelo($request->all());  
        $modelo->save();
        return redirect('/admin/modelo');
    }

    public function update(Request $request, $id)
    {

        $modelo = Modelo::findOrFail($id);
        $modelo->fill($request->all());
       
        $modelo->save();
        return redirect('/admin/modelo');
    }

    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);
        $marcas = Marca::get();
        return view('admin.modelo.edit', compact('modelo', 'marcas'));
    }

    public function show($id)
    {
        Session::put('modelo_id', $id);
        return redirect('/admin/producto');
    }

    public function destroy($id)
    {
        $modelo = Modelo::findOrFail($id);
      
        $modelo->delete();

        return redirect('/admin/modelo');
    } 
}
