<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
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
        'orden',
        'portada',
        'publicado',
        'categoria_id', 
    ];
    
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
