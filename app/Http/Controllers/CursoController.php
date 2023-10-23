<?php

namespace App\Http\Controllers;

use App\Models\curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cursos = curso::all();
        return response()->json($cursos);
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

        $curso = new curso();
        $curso->nombre = $data['nombre'];

        $curso->save();

        return response()->json(['message' => 'curso creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $curso = curso::find($id);
        return response()->json($curso);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $curso = curso::find($id);

        if (!$curso) {
            return response()->json(['message' => 'curso no encontrado'], 404);
        }

        $curso->nombre = $data['nombre'];

        $curso->save();

        return response()->json(['message' => 'curso actualizado exitosamente']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $curso = curso::find($id);
        if (!$curso) {
            return response()   ->json(['message' => 'curso no encontrado'], 404);
        }

        $curso->delete();
        return response()->json(['message' => 'curso eliminado'], 200);
    }
}
