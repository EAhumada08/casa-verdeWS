<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !\Hash::check($request->contraseña, $usuario->contraseña)) {
            return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
        }

        // Puedes generar un token JWT u otra lógica
        return response()->json(['mensaje' => 'Login exitoso'], 200);
    }
}
