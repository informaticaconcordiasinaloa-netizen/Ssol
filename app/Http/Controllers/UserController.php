<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Department;

class UserController extends Controller
{
    public function create(){
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role_id' => 'required'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id
    ]);

    return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }
    
    public function index(){

        $users= User::all();
        
        return view('users.index', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $departments = Department::all();
        $roles = Role::all();

        return view('users.edit', compact('user','roles','departments'));
    }


    public function update(Request $request, $id){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'department_id' => 'nullable|exists:departments,id',
            'role_id' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'department_id', 'role_id'));
        

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }


}
