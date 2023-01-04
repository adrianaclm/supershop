<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'razonSocial',
        'rif',
        'direccion',
        
        'celular',
        'email',
        'facebook',
        'instagram',

        'somos',
        'urlsomos',
        'historia',
        'urlhistoria',
        'mision',
        'urlmision',
        'vision',
        'urlvision',
        'valores',
        'urlvalores',

        'seo_title',
        'seo_description',
        'seo_image',
    ];
}