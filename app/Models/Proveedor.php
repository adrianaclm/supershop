<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'razon_social',
        'RIF',
        'telefono',
        'correo',
        'direccion',
        'nro_cuenta',
        'banco',
    ];

    public function Producto()
    {
        return $this->hasOneThrough(Producto::class, 'id');
    }
}