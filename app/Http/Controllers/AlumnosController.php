<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    //
    public function index()
    {
        $alumnos = Alumno::all();
        //dd($alumnos);
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|unique:alumnos',
            'edad' => 'required|integer|min:18|max:30',

        ]);
        Alumno::create([
            'nombre' => $request->name,
            'apellido' => $request->apellido,
            'email'=> $request->email,
            'edad' => $request->edad,

        ]);
        return redirect()->route('alumnos.index')
            ->with('success', 'Item created successfully.');
    }

    public function edit(string $id){
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

    public function update( Request $request, string $id ){

        $alumno = Alumno::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'email' => 'required|email|unique:alumnos,email,' . $alumno->id,
            'edad' => 'required|integer|min:18|max:30',

        ]);

        $alumno-> update($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Item updated successfully.');
    }

    public function show(Alumno $alumno){
        return view('alumnos.show', compact('alumno'));
    }

    public function destroy(Alumno $alumno){
        $alumno->delete();
        return redirect()->route('alumnos.index')
            ->with('success', 'Entry deleted successfully.');
    }

    public function queueAlum()
    {
        $alumnos = Alumno::orderBy('id', 'desc')->get(); // Use 'id' instead of 'alumnoID'
        return view('alumnos.queueAlum', compact('alumnos'));
    }



}



