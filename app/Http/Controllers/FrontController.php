<?php

namespace App\Http\Controllers;

use App\Models\Carrusel;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Modelo;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function index(){
        $imgs = Carrusel::orderby('order','asc')->get();
        $categorias = Categoria::orderBy('visitas','desc')->take(8)->get(["slug","nombre", "imagen"]);
        $productos = Producto::orderBy('orden')->take(8)->get();
               
        return view('welcome', compact("imgs", "categorias", "productos"));
    }

    //relacion de las categorias con los productos
    public function categoria($categoria){
        $categoria = Categoria::whereSlug($categoria)->first(); 
        
        return view('front.categoria', compact('categoria')); 
    }

    //descripcion del producto
    //public function show(){
     //   $producto = Producto::orderBy('id')->take(1)->get();
       // return view('front.producto', compact('producto'));
    //    $productos = Producto::all();
    //    return view('front.producto', compact('productos'));
   
    //}
    
    public function producto($id)
    {
        $producto = Producto::findOrFail($id);
        
        $prd = Producto::select('productos.id', 'productos.nombre', 'productos.descripcion', 'productos.image', 'productos.stock', 'productos.cod_barra', 'productos.serial', 'productos.pvp_detal', 'productos.pvp_mayor', 'categorias.id as cai', 'categorias.nombre as cn', 'marcas.id as mai', 'marcas.nombre as mn', 'modelos.id as moi', 'modelos.codigo', 'modelos.ano', 'modelos.peso', 'modelos.talla', 'modelos.tamano', 'modelos.color', 'modelos.cod_imei', 'modelos.garantia', 'modelos.tipo_garantia')
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->join('marcas', 'productos.marca_id', '=', 'marcas.id')
        ->join('modelos', 'productos.modelo_id', '=', 'modelos.id')
        ->where('productos.id', '=', $id)
        ->first();
        
        //$marcas= Producto::join('marcas',  'productos.marca_id', 'marcas.id')->where('m.marca_id')->get('marcas.nombre');
        //$modelo = $producto->modelo; 
        //$marca = $producto->marca;
        //$producto = Producto::orderBy('id')->get($producto);
        //$productos = Producto::whereCategoria_id(Session::get('categoria_id'))->get();
        //$productos = Producto::whereMarca_id(Session::get('marca_id'))->get();
        //$productos = Producto::whereModelo_id(Session::get('modelo_id'))->get();

        return view('front.producto', compact('producto', 'prd'));
    }

    public function checkout(){
        $cartCollection = \Cart::getContent();
        return view('cart.checkout')->with('success_msg', '¡Su pedido está siendo procesado!');
    }
    
   
}

