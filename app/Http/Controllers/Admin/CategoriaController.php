<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;




class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view("admin.categoria.index", compact('categorias'));
    }

    public function create(){
        return view('admin.categoria.create');
    }

    public function store(Request $request){

        $categoria = new Categoria($request->all());

        if ($request->hasFile('seo_image')) {

            $file = $request->file('seo_image');
            $nombre = $file->getClientOriginalName();
            Image::make($file->getRealPath())
            ->resize(200,200,function($constraint){ $constraint->upsize();  })
            ->save( public_path('img/categoria/'.$nombre));

            $categoria->seo_image = $nombre;
  
          }

        if ($request->hasFile('imagen')) {

            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            Image::make($file->getRealPath())
            ->resize(600,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('img/categoria/'.$nombre));
        
            $categoria->imagen = $nombre;
        }

        $categoria->portada = $request->portada ? 1 : 0;
        $categoria->publicado = $request->publicado ? 1 : 0;

        $categoria->save();
        return redirect('admin/categoria');
    }

    public function update(Request $request, $id)
    {

        $categoria = Categoria::findOrFail($id);
        $categoria->fill($request->all());

        $foto_anterior     = $request->imagen;
        $seoimagen_anterior = $request->seo_image;


        if($request->hasFile('imagen')){

            $rutaAnterior = public_path('img/categoria/'.$foto_anterior);
            if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

            $imagen = $request->file('imagen');
            
            $nuevonombre = 'crs'.time().'.'.$imagen->guessExtension();
            Image::make($imagen->getRealPath())
            ->resize(600,400,function($constraint){ $constraint->upsize();  })
            ->save( public_path('img/categoria/'.$nuevonombre));

            $categoria->imagen = $nuevonombre;
        }
       

        if($request->hasFile('seo_image')){

            $rutaAnterior = public_path('img/categoria/'.$seoimagen_anterior);
            if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

            $seo_image = $request->file('seo_image');
            
            $nuevonombre = 'crs'.time().'.'.$seo_image->guessExtension();
            Image::make($seo_image->getRealPath())
            ->resize(200,200,function($constraint){ $constraint->upsize();  })
            ->save( public_path('img/categoria/'.$nuevonombre));

            $categoria->seo_image = $nuevonombre;
        }
    
       
        $categoria->save();
        return redirect('/admin/categoria');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function show($id)
    {
        Session::put('categoria_id', $id);
        return redirect('/admin/marca');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        // $borrar = public_path('img/categoria/'.$categoria->imagen);
        // if(file_exists($borrar)){ unlink(realpath($borrar)); }
        $categoria->delete();
        return redirect('/admin/categoria');
 
    }
}
?>