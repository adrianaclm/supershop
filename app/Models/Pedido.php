<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [   
        'id',
        'subtotal',
        'impuesto',
        'total',
        'fecha',
        'cedula',
        'estados_id',
        'user_id',
        'cart_id'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function estados(){
        return $this->belongsTo(Estado::class);
    }

    public function detalles(){
        return $this->hasMany(Detalle::class);
    }

    /*
    public static function findOrCreateBySessionID($shopping_car_id){
        if($shopping_car_id)
            // Buscar el carrito de compras con este ID
            return Pedido::findBySession($shopping_car_id);
        else
            // crear un carrito de compras
            return Pedido::createWithoutSession();
    }

    public static function findBySession($shopping_car_id){
        return Pedido::find($shopping_car_id);
    }

    public static function createWithoutSession(){

        return Pedido::create([
            "status" => "incompleted"

        ]);
       
    }  
    */
}
