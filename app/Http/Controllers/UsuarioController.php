<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los usuarios
        return response()->json(Usuario::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $usuario = Usuario::create($request->all());
            return response()->json($usuario, 201);
            //code...
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Código MySQL para "Duplicate entry"
                return response()->json([
                    'error' => 'El correo ya está registrado.'
                ], 409);
            }

            // Otros errores
            return response()->json([
                'error' => 'Ocurrió un error inesperado.'
            ], 500);
        }
    }

    public function show(string $id)
    {
        // Buscar el usuario por ID
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        return response()->json($usuario, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // No es necesario para APIs, solo para vistas web
        return response()->json(['message' => 'Método no implementado.'], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'apellidoP' => 'nullable|string|max:255',
            'apellidoM' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:usuarios,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'calle' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:10',
        ]);

        // Buscar el usuario
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        // Actualizar los campos
        $usuario->update([
            'nombre' => $validatedData['nombre'] ?? $usuario->nombre,
            'apellidoP' => $validatedData['apellidoP'] ?? $usuario->apellidoP,
            'apellidoM' => $validatedData['apellidoM'] ?? $usuario->apellidoM,
            'email' => $validatedData['email'] ?? $usuario->email,
            'password' => isset($validatedData['password']) ? Hash::make($validatedData['password']) : $usuario->password,
            'calle' => $validatedData['calle'] ?? $usuario->calle,
            'ciudad' => $validatedData['ciudad'] ?? $usuario->ciudad,
            'estado' => $validatedData['estado'] ?? $usuario->estado,
            'codigo_postal' => $validatedData['codigo_postal'] ?? $usuario->codigo_postal,
        ]);

        return response()->json([
            'message' => 'Usuario actualizado exitosamente.',
            'usuario' => $usuario->makeHidden(['password']),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el usuario
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        // Eliminar usuario
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado exitosamente.'], 200);
    }
}