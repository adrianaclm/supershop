<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carruofertas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'description',
        'urlfoto',
        'link',
        'orden',
    ];
}