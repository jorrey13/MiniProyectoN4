<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asistencias = asistencia::all();
        return response()->json($asistencias);
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

        $asistencia = new asistencia();
        $asistencia->alumno_id = $data['alumno_id'];
        $asistencia->curso_id = $data['curso_id'];
        $asistencia->fecha = $data['fecha'];
        $asistencia->estado = $data['estado'];

        $asistencia->save();

        return response()->json(['message' => 'asistencia creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencia = asistencia::find($id);
        return response()->json($asistencia);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $asistencia = asistencia::find($id);

        if (!$asistencia) {
            return response()->json(['message' => 'asistencia no encontrado'], 404);
        }

        $asistencia->alumno_id = $data['alumno_id'];
        $asistencia->curso_id = $data['curso_id'];
        $asistencia->fecha = $data['fecha'];
        $asistencia->estado = $data['estado'];
        
        $asistencia->save();

        return response()->json(['message' => 'asistencia actualizado exitosamente']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = asistencia::find($id);
        if (!$asistencia) {
            return response()   ->json(['message' => 'asistencia no encontrado'], 404);
        }

        $asistencia->delete();
        return response()->json(['message' => 'asistencia eliminado'], 200);
    }
}
