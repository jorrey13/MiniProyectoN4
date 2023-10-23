<?php

namespace App\Http\Controllers;

use App\Models\docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $docentes = docente::all();
        return response()->json($docentes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $docente = new docente();
        $docente->nombre = $data['nombre'];
        $docente->email = $data['email'];
        $docente->direccion = $data['direccion'];

        $docente->save();

        return response()->json(['message' => 'docente creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docente = docente::find($id);
        return response()->json($docente);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $docente = docente::find($id);

        if (!$docente) {
            return response()->json(['message' => 'docente no encontrado'], 404);
        }

        $docente->nombre = $data['nombre'];
        $docente->email = $data['email'];
        $docente->direccion = $data['direccion'];

        $docente->save();

        return response()->json(['message' => 'docente actualizado exitosamente']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docente = docente::find($id);
        if (!$docente) {
            return response()   ->json(['message' => 'docente no encontrado'], 404);
        }

        $docente->delete();
        return response()->json(['message' => 'docente eliminado'], 200);
    }
}
