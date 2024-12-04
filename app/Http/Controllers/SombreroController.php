<?php

namespace App\Http\Controllers;

use App\Models\Sombrero;
use Illuminate\Http\Request;

class SombreroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Sombrero::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sombrero = Sombrero::create($request->all());
            return response()->json($sombrero, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sombrero = Sombrero::find($id);
        if(is_null($sombrero)){
            return response()->json(["mensaje" => "Sombrero no encontrado"],404);
        }
        return response()->json($sombrero,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
