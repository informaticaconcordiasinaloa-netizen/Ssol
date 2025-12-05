<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/suma', [SumaController::class, 'index']);
Route::post('/suma', [SumaController::class, 'suma']);

Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/create', [UserController::class, 'create'])->name('users.create');
Route::post('/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
