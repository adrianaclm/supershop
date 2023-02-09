<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class EmpresaController extends Controller
{
    public function index()
    {
        $registro = Empresa::find(1);
        return view("admin.empresa.index", compact('registro'));
    }

    public function update(Request $r, $id)
    {
        $registro = Empresa::findOrFail($id);
        $somos_anterior      = $registro->urlsomos;
        $historia_anterior   = $registro->urlhistoria;
        $mision_anterior     = $registro->urlmision;
        $vision_anterior     = $registro->urlvision;
        $valores_anterior    = $registro->urlvalores;

        $registro->fill($r->all());

        if ($r->hasFile('urlsomos')) {

            $rutaAnterior = public_path("/img/empresa/" . $somos_anterior);
            if ((file_exists($rutaAnterior)) || ($somos_anterior = null)) {
                unlink(realpath($rutaAnterior));
            }

            $imagen = $r->file('urlsomos');
            $nuevonombre = Str::slug($r->id) . time() . $imagen->getClientOriginalName();
            Image::make($imagen->getRealPath())
                ->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/img/empresa/' . $nuevonombre));

            $registro->urlsomos = $nuevonombre;
        }

        if ($r->hasFile('urlhistoria')) {

            $rutaAnterior = public_path("/img/empresa/" . $historia_anterior);
            if ((file_exists($rutaAnterior)) || ($historia_anterior = null)) {
                unlink(realpath($rutaAnterior));
            }

            $imagen = $r->file('urlhistoria');
            $nuevonombre = Str::slug($r->id) . '_hst.' . $imagen->getClientOriginalName();
            Image::make($imagen->getRealPath())
                ->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/img/empresa/' . $nuevonombre));

            $registro->urlhistoria = $nuevonombre;
        }

        if ($r->hasFile('urlmision')) {

            $rutaAnterior = public_path("/img/empresa/" . $mision_anterior);
            if ((file_exists($rutaAnterior)) || ($mision_anterior = null)) {
                unlink(realpath($rutaAnterior));
            }

            $imagen = $r->file('urlmision');
            $nuevonombre = Str::slug($r->id) . '_msn.' . $imagen->getClientOriginalName();
            Image::make($imagen->getRealPath())
                ->resize(850, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path("/img/empresa/" . $nuevonombre));

            $registro->urlmision = $nuevonombre;
        }

        if ($r->hasFile('urlvision')) {

            $rutaAnterior = public_path("/img/empresa/" . $vision_anterior);
            if ((file_exists($rutaAnterior)) || ($vision_anterior = null)) {
                unlink(realpath($rutaAnterior));
            }

            $imagen = $r->file('urlvision');
            $nuevonombre = Str::slug($r->id) . '_vsn.' . $imagen->getClientOriginalName();
            Image::make($imagen->getRealPath())
                ->resize(850, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path("/img/empresa/" . $nuevonombre));

            $registro->urlvision = $nuevonombre;
        }

        if ($r->hasFile('urlvalores')) {

            $rutaAnterior = public_path("/img/empresa/" . $valores_anterior);
            if ((file_exists($rutaAnterior)) || ($valores_anterior = null)) {
                unlink(realpath($rutaAnterior));
            }

            $imagen = $r->file('urlvalores');
            $nuevonombre = Str::slug($r->id) . '_vlr.' . $imagen->getClientOriginalName();
            Image::make($imagen->getRealPath())
                ->resize(850, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path("/img/empresa/" . $nuevonombre));

            $registro->urlvalores = $nuevonombre;
        }

        $registro->save();
        
        return redirect()->route('empresa.index');
    }
}
