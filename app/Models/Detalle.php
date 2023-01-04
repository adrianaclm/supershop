<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $fillable = [   
        'id',
        'cantidad',
        'preciototal',
        'pedido_id',
        'producto_id',
        'created_at',
        'updated_at',

        

    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function pedidos()
    {
        return $this->belongsTo(Pedido::class);
    }
}
