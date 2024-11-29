<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'age' => 'required|integer|min:18|max:100',
        ]);

        // Create a new Alumno instance with validated data
        Alumno::create([
            'nombre' => $request->name,
            'apellido' => $request->lastname,
            'email' => $request->email,
            'edad' => $request->age,
        ]);

        // Redirect back to the alumnos index with a success message
        return redirect()->route('alumnos.index')
            ->with('success', 'Agregó el estudiante correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        // Validate the data, ensuring the email is unique except for the current alumno
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:alumnos,email,' . $alumno->id,
            'age' => 'required|integer',
        ]);

        // Update the alumno's data
        $alumno->update([
            'nombre' => $request->name,
            'apellido' => $request->lastname,
            'email' => $request->email,
            'edad' => $request->age,
        ]);

        // Redirect with a success message
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}
