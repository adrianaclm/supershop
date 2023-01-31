<?php

namespace App\Http\Controllers\Admin;

use Image;
use Session;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductoController extends Controller
{
    //listado
    public function index()
    {
        // $productos = Producto::whereCategoria_id(Session::get('categoria_id'))->get();
        // $productos = Producto::whereMarca_id(Session::get('marca_id'))->get();
        // $productos = Producto::whereModelo_id(Session::get('modelo_id'))->get();

        $productos = Producto::all();
        $producto = Producto::paginate(10);


        return view("admin.producto.index", compact('productos', 'producto'));
    }

    //insertar
    public function create()
    {
   
        $modelos = Modelo::get();
        $marcas = Marca::get();       
        $categorias = Categoria::get();
        $proveedor = Proveedor::get();
     
        return view('admin.producto.create',  compact('proveedor', 'categorias', 'modelos', 'marcas'));
    
    }

    public function store(Request $request)
    {
        $producto = new Producto($request->all());

        if ($request->hasFile('seo_image')) {

            $file = $request->file('seo_image');
            $nombre = time() . '.' . $file->guessExtension();
            Image::make($file->getRealPath())
                ->fit(600, 400, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('img/producto/' . $nombre));

            $producto->seo_image = $nombre;
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $nombre = time() . '.' . $file->guessExtension();
            Image::make($file->getRealPath())
                ->fit(600, 400, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('img/producto/' . $nombre));
            $producto->image = $nombre;
        }

        $producto->publicado = $request->publicado ? 1 : 0;
   


        $producto->save();
        return redirect('/admin/producto');
    }

    //actualizar
    public function edit($id)
    {
        $modelos = Modelo::get();
        $marcas = Marca::get();       
        $categorias = Categoria::get();
        $proveedor = Proveedor::get();
        $producto = Producto::findOrFail($id);
        $prd = Producto::select('productos.id as pri', 'categorias.id as ci', 'categorias.nombre as cn', 'marcas.id as mi', 'marcas.nombre as mn', 'modelos.id as moi', 'modelos.codigo', 'proveedors.id as pi', 'proveedors.razon_social as pn')
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
        ->join('modelos', 'productos.modelo_id', '=', 'modelos.id')
        ->join('proveedors', 'productos.proveedor_id', '=', 'proveedors.id')
        ->where('productos.id', '=', $id)->first();

        return view('admin.producto.edit',  compact('prd','proveedor', 'categorias', 'modelos', 'marcas', 'producto'));

    }


    public function update(Request $r, $id)
    {

        $producto = Producto::findOrFail($id);
        $seo_imageanterior = $producto->seo_image;
        $imageanterior = $producto->image;

        $producto->fill($r->all());

        if ($r->hasFile('seo_image')) {
            $rutaAnterior = public_path('img/producto/' . $seo_imageanterior);
            if (file_exists($rutaAnterior)) {
                unlink(realpath($rutaAnterior));
            }

            $file = $r->file('seo_image');
            $nombre = time() . 'seo.' . $file->guessExtension();
            Image::make($file->getRealPath())
                ->fit(400, 400, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('img/producto/' . $nombre));
            $producto->seo_image = $nombre;
        }

        if ($r->hasFile('image')) {
            $rutaAnterior = public_path('img/producto/' . $imageanterior);
            if (file_exists($rutaAnterior)) {
                unlink(realpath($rutaAnterior));
            }

            $file = $r->file('image');
            $nombre = time() . '.' . $file->guessExtension();
            Image::make($file->getRealPath())
                ->fit(600, 400, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('img/producto/' . $nombre));
            $producto->image = $nombre;
        }

        $producto->publicado = $r->publicado ? 1 : 0;

        $producto->save();
        return redirect('admin/producto');
    }


    public function show($id)
    {
        Session::put('producto_id', $id);
        return redirect('admin/producto');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        // $borrar = public_path('img/producto/'.$producto->seo_image);
        // if(file_exists($borrar)){ unlink(realpath($borrar)); }

        // $rutaAnterior = public_path('img/producto/'.$producto->image);
        // if(file_exists($rutaAnterior)){ unlink(realpath($rutaAnterior)); }

        $producto->delete();
        return redirect('/admin/producto');
    }
}
// $carrusel = Carrusel::findOrFail($id);
// $borrar = public_path('img/carrusel/'.$carrusel->image);
// if(file_exists($borrar)){ unlink(realpath($borrar)); }
// $carrusel->delete();
// return redirect('/admin/carrusel');