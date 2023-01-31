<?php

namespace App\Http\Controllers\Admin;

use Image;
use Session;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;





class MarcaController extends Controller
{

    public function index()
    {
        //if(!empty(Session::get('categoria_id'))){
        //    $marcas = Marca::whereCategoria_id(Session::get('categoria_id'))->get();
        $marcas = Marca::all();
        return view("admin.marca.index", compact('marcas'));
        
    }

    public function create()
    {
        $categorias = Categoria::get();
        return view('admin.marca.create', compact('categorias'));
    }

    public function store(Request $request)
    {   
        $marca = new Marca($request->all());
        
        if ($request->hasFile('urlfoto')) {

            $imagen = $request->file('urlfoto');
            $nuevonombre = time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
                ->fit(1200,450,function($constraint){ $constraint->upsize();  })
                ->save( public_path('img/marca/'.$nuevonombre));

            $marca->urlfoto = $nuevonombre;
        }
      
        $marca->categoria_id = Session::get('categoria_id');
        $marca->save();
        return redirect('/admin/marca');
    }       

    public function edit($id)
    {
        $marca = Marca::findOrFail($id);        
       
        $categorias = Categoria::get();
        return view('admin.marca.edit', compact('categorias', 'marca'));
    }    
    public function update(Request $r, $id)
    {

        $marca = Marca::findOrFail($id);
        $foto_anterior      = $r->urlfoto;

        $marca->fill($r->all());
       
        if ($r->hasFile('urlfoto')) {

            $rutaAnterior = public_path('img/marca/' . $foto_anterior);
            if (file_exists($rutaAnterior)) {
                unlink(realpath($rutaAnterior));
            }

            $imagen = $r->file('urlfoto');
            $nuevonombre = time().'.' . $imagen->guessExtension();
            Image::make($imagen->getRealPath())
                ->fit(1200, 450, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('img/marca/' . $nuevonombre));

            $marca->urlfoto = $nuevonombre;
        }

       

        $marca->save();
        return redirect('admin/marca');
    }
 

    public function show($id)
    {
        Session::put('marca_id', $id);        
        return redirect('admin/modelo');
    }

    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        // $borrar = public_path('img/marca/'.$marca->urlfoto);
        // if(file_exists($borrar)){ unlink(realpath($borrar)); }
      
        // $marca->delete();

        return redirect('admin/marca');
    } 

}


