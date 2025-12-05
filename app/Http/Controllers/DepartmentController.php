<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request){
    $validated = $request->validate([
        'nombre' => [
            'required',
            'string',
            'max:255',
            'unique:departments',
            'regex:/^[^\s].*[^\s]$/', // prohibe espacios al inicio y final
        ],
        'activo' => 'required|boolean',
        'editable' => 'required|boolean',
    ], [
        'nombre.required' => 'El nombre del departamento es obligatorio.',
        'nombre.unique' => 'Ya existe un departamento con ese nombre.',
        'nombre.regex' => 'El nombre no puede comenzar ni terminar con espacios.',
    ]);

    Department::create($validated);

    return redirect()->route('departments.index')
        ->with('success', 'Departamento añadido correctamente.');
}


    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department){
        $validated = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^\s].*[^\s]$/',
                'unique:departments,nombre,' . $department->id . ',id'
            ],
            'activo' => 'required|boolean',
            'editable' => 'required|boolean',
        ], [
            'nombre.required' => 'El nombre del departamento es obligatorio.',
            'nombre.unique' => 'Ya existe un departamento con ese nombre.',
            'nombre.regex' => 'El nombre no puede comenzar ni terminar con espacios.',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')
            ->with('success', 'Departamento actualizado correctamente.');
    }


}
