<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
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
        'imagen',
        'orden',
        'portada',
        'publicado',
        'visitas',        

    ];

      public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}