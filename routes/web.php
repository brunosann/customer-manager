<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->group(function () {
  Route::get('/', [ClientController::class, 'index'])->name('client.index');
  Route::get('/cliente/criar', [ClientController::class, 'create'])->name('client.create');
  Route::post('/cliente', [ClientController::class, 'store'])->name('client.store');
  Route::get('/cliente/{id}/editar', [ClientController::class, 'edit'])->name('client.edit');
  Route::patch('/cliente/{id}', [ClientController::class, 'update'])->name('client.update');
  Route::delete('cliente/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
  Route::get('auth/sair', [AuthController::class, 'logout'])->name('logout');
});

Route::view('/entrar', 'login')->name('login');
Route::post('/entrar', [AuthController::class, 'login'])->name('login.submit');
Route::view('/redefinir-senha', 'forgot-password')->name('forgot.password');
Route::post('/redefinir-senha', [AuthController::class, 'forgotPassword'])->name('forgot.password.submit');
Route::get('/alterar-senha/{token}', [AuthController::class, 'showPasswordReset'])->name('password.reset');
Route::post('/alterar-senha', [AuthController::class, 'passwordReset'])->name('password.reset.submit');
