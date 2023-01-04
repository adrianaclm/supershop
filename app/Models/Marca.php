<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
   use HasFactory;
   public $timestamps = false;
   protected $fillable = [
      'id',
      'nombre',
      'serial',
      'urlfoto',
      'categoria_id',
   ];

   public function Categoria()
   {
      return $this->hasOne(Categoria::class, 'id', 'categoria_id');
   }

   public function Modelo()
   {
      return $this->hasMany("App\Modelo");
   }

   public function Producto()
   {
      return $this->hasMany("App\Producto");
   }
}