<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Models\Configuracion;
use App\Models\Categoria;
use App\Models\Producto;

class MenuComposer{

    public function compose(View $view){

        $config = Configuracion::find(1);
        $menu   = Categoria::orderBy('nombre', 'asc')->get(['slug', 'nombre']);
        $pro    = Producto::orderBy('id')->get();
        $view->with('config', $config)->with("menu", $menu)->with('pro', $pro);
    }
}
?>