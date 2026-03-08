<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        Role::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('roles.index');
    }

}