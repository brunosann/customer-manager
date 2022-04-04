<?php

use App\Http\Controllers\AuthController;
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
  Route::get('/', function () {
    return view('home');
  })->name('home');
});

Route::view('/entrar', 'login')->name('login');
Route::post('/entrar', [AuthController::class, 'login'])->name('login.submit');
Route::view('redefinir-senha', 'forgot-password')->name('forgot.password');
