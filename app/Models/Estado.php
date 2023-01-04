<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nombre',
        
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}
