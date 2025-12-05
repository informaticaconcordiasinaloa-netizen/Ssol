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
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email'));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }

}
