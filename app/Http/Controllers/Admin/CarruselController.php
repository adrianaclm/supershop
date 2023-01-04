<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrusel;
use Illuminate\Support\Facades\Session;
use Image;


class CarruselController extends Controller
{
    
    
    public function index(){
        $carrusels = Carrusel::orderBy('order')->get();
        return view("admin.carrusel.index",compact('carrusels'));
    }

    public function create(){

        return view('admin.carrusel.create');
    }

    public function store(Request $request){

        $carrusel = new Carrusel($request->all());
        
        if($request->hasFile('image')){

            $imagen = $request->file('image');
            $nuevonombre = 'crs'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(1200, 300,function($constraint){ $constraint->upsize();  })
            ->save( public_path('img/carrusel/'.$nuevonombre));

            $carrusel->image = $nuevonombre;
        }
        $carrusel->save();
        return redirect('/admin/carrusel');

    }

    public function update(Request $request,$id){

        $carrusel = Carrusel::findOrFail($id);
        $carrusel->fill($request->all());
        $foto_anterior     = $request->image;


        if($request->hasFile('image')){

            $rutaAnterior = public_path('img/carrusel/'.$foto_anterior);
            if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

            $imagen = $request->file('image');
            
            $nuevonombre = 'crs'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->fit(1200, 300,function($constraint){ $constraint->upsize();  })
            ->save( public_path('img/carrusel/'.$nuevonombre));

            $carrusel->image = $nuevonombre;
        }
       
        $carrusel->save();
        return redirect()->route('carrusel.index');
    }

    public function edit($id){
        $carrusel = Carrusel::findOrFail($id);
        return view('admin.carrusel.edit',compact('carrusel'));
    }

    public function show($id)
    {
        Session::put('carrusel_id', $id);
        return view('admin.carrusel', compact('carrusel'));
    }

    public function destroy($id){
        $carrusel = Carrusel::findOrFail($id);
        $borrar = public_path('img/carrusel/'.$carrusel->image);
        if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $carrusel->delete();
        return redirect('/admin/carrusel');
    }
}