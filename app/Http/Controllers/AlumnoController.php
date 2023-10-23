<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumnos = alumno::all();
        return response()->json($alumnos);
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

        $alumno = new alumno();
        $alumno->nombre = $data['nombre'];
        $alumno->email = $data['email'];
        $alumno->fecha_nacimiento = $data['fecha_nacimiento'];
        $alumno->direccion = $data['direccion'];

        $alumno->save();

        return response()->json(['message' => 'alumno creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = alumno::find($id);
        return response()->json($alumno);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $alumno = alumno::find($id);

        if (!$alumno) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        $alumno->nombre = $data['nombre'];
        $alumno->email = $data['email'];
        $alumno->fecha_nacimiento = $data['fecha_nacimiento'];
        $alumno->direccion = $data['direccion'];

        $alumno->save();

        return response()->json(['message' => 'Alumno actualizado exitosamente']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = alumno::find($id);
        if (!$alumno) {
            return response()   ->json(['message' => 'Alumno no encontrado'], 404);
        }

        $alumno->delete();
        return response()->json(['message' => 'Alumno eliminado'], 200);
    }
}
