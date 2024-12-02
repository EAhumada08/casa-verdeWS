<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use HasFactory, Notifiable;

    // Establece la tabla asociada
    protected $table = 'administradors'; 

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
    ];

    // Encriptar la contraseña al momento de ser asignada
    public function setContraseñaAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }

    // Obtener la contraseña encriptada
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
