<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean',
            'editable' => 'required|boolean',
        ]);

        Department::create($request->validate([
            'nombre'   => 'required|string|max:255',
            'activo'   => 'required|boolean',
            'editable' => 'required|boolean',
        ]));


        return redirect()->route('departments.index');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean',
            'editable' => 'required|boolean',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index');
    }
}
