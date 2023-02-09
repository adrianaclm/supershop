<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use Session;
use Image;


class ConfiguracionController extends Controller
{
    public function index()
    {
        $config = Configuracion::find('1');
        return view('admin.configuracion.index', compact('config'));
    }

    public function update(Request $r, $id)
    {
        $config = Configuracion::findOrFail($id);
        $seo_imageanterior  = $config->seo_image;
        $favicon_anterior   = $config->favicon;
        $logo_anterior      = $config->logo;

        $config->fill($r->all());

        if ($r->hasFile('seo_image')) {

            $rutaAnterior = public_path("/img/configuracion/" . $seo_imageanterior);
            if ((file_exists($rutaAnterior)) && ($seo_imageanterior != null)) {
                unlink(realpath($rutaAnterior));
            }

            $file = $r->file('seo_image');
            $nombre = time() . $file->getClientOriginalName();
            Image::make($file->getRealPath())
                ->fit(1080, 307, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('/img/configuracion/' . $nombre));
            $config->seo_image = $nombre;
        }

        if ($r->hasFile('favicon')) {

            $rutaAnterior = public_path("/img/configuracion/" . $favicon_anterior);
            if ((file_exists($rutaAnterior)) && ($favicon_anterior != null)) {
                unlink(realpath($rutaAnterior));
            }

            $file = $r->file('favicon');
            $nombre = time() . $file->getClientOriginalName();
            Image::make($file->getRealPath())
                ->fit(200, 200, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('/img/configuracion/' . $nombre));
            $config->favicon = $nombre;
        }

        if ($r->hasFile('logo')) {

            $rutaAnterior = public_path("/img/configuracion/" . $logo_anterior);
            if ((file_exists($rutaAnterior)) && ($logo_anterior != null)) {
                unlink(realpath($rutaAnterior));
            }

            $file = $r->file('logo');
            $nombre = time() . $file->getClientOriginalName();
            Image::make($file->getRealPath())
                ->fit(1200, 300, function ($constraint) {
                    $constraint->upsize();
                })
                ->save(public_path('/img/configuracion/' . $nombre));

            $config->logo = $nombre;
        }

        $config->save();
        return redirect()->route('configuracion.index');
    }


    public function show($id)
    {
        Session::put('configuracion_id', $id);
        return redirect('/admin/configuracion');
    }
}
