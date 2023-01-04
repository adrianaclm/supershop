<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [       
        'id',
        'slug',
        'seo_title',
        'seo_description',
        'seo_image',

        'nombre',
        'descripcion',
        'image',
        'stock',
        'cod_barra',
        'serial',

        'pvp_detal',
        'pvp_mayor',
        
        'orden',
        'publicado',

        'categoria_id', 
        'marca_id',
        'modelo_id',
        'proveedor_id',
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function marcas()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelos()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function proveedors()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }

}