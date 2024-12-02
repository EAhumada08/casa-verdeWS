<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Administrador; 
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
    public function loginadmin(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required|string',
        ]);

        $administrador = Administrador::where('correo', $request->correo)->first();

        if (!$administrador || !Hash::check($request->contraseña, $administrador->contraseña)) {
            return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'mensaje' => 'Login exitoso',
            'administrador' => [
                'id' => $administrador->id,
                'nombre' => $administrador->nombre,
                'correo' => $administrador->correo,
            ],
        ], 200);
    }
}
