<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'usuario';
    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'correo',
        'contraseña',
        'calle',
        'ciudad',
        'estado',
        'CodigoP',
    ];

    protected $hidden = [
        'contraseña',
    ];

    protected $casts = [
        'correo_verified_at' => 'datetime',
    ];
}