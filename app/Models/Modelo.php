<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'codigo',
        'ano',
        'peso',
        'talla',
        'tamano',
        'color',
        'cod_imei',
        'garantia',
        'tipo_garantia',
        'marca_id'
    ];

    public function Marca()
    {
        return $this->belongsTo("App\Marca");
    }


    public function Producto()
    {
        return $this->hasMany("App\Producto");
    }
}