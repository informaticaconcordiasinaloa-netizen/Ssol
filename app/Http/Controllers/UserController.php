<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }
    
    public function index(){

        $users= User::all();
        
        return view('users.index', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $departments = \App\Models\Department::where('activo', 1)->get();

        return view('users.edit', compact('user', 'departments'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'department_id' => 'nullable|exists:departments,id',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'department_id'));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }


}
