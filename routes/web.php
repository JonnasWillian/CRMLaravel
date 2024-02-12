<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard',[ClienteController::class, 'view'])->middleware(['auth', 'verified'])->name('dashboard');

// Controle dos clientes
Route::post('/cliente', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/cliente/{cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

// Controle de arquivos
Route::post('/clienteFile/{cliente}', [ClienteController::class, 'createFile'])->name('cliente.createFile');
Route::get('/clienteDowload/{cliente}', [ClienteController::class, 'downloadFile'])->name('cliente.downloadFile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
