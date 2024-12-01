<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class AdminCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los administradores
        return response()->json(Administrador::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        try {
            $usuario = Administrador::create($request->all());
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
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar el administrador por ID
        $administrador = Administrador::find($id);

        if (!$administrador) {
            return response()->json(['message' => 'Administrador no encontrado.'], 404);
        }

        return response()->json($administrador, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'correo' => 'nullable|string|email|max:255|unique:administradores,correo,' . $id,
            'contraseña' => 'nullable|string|min:8|confirmed',
        ]);

        
        $administrador = Administrador::find($id);

        if (!$administrador) {
            return response()->json(['message' => 'Administrador no encontrado.'], 404);
        }

      
        $administrador->update([
            'nombre' => $validatedData['nombre'] ?? $administrador->nombre,
            'correo' => $validatedData['correo'] ?? $administrador->correo,
            'contraseña' => isset($validatedData['contraseña']) ? Hash::make($validatedData['contraseña']) : $administrador->contraseña,
        ]);

        return response()->json([
            'message' => 'Administrador actualizado exitosamente.',
            'administrador' => $administrador->makeHidden(['contraseña']), 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $administrador = Administrador::find($id);

        if (!$administrador) {
            return response()->json(['message' => 'Administrador no encontrado.'], 404);
        }

        
        $administrador->delete();

        return response()->json(['message' => 'Administrador eliminado exitosamente.'], 200);
    }
}
