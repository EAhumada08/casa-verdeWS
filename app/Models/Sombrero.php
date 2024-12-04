<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sombrero extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'subtitulo',
        'imagen',
        'precio',
        'calidad',
        'material',
        'ala',
        'copa'
    ];
}
