<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleController;

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

Route::get('/login', function () {
    return view('auth.login')->name('login');
});

Route::get('/prueba', function(){
    return view('components.layout-user.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/pruebas', function () {
    return view('welcome');
});

// Ruta inicio

Route::get('/', function(){
    return view('components.layout-public.index');
});

// Rutas calendario

Route::get('/event', [EventController::class, 'index']);


// GOOGLE MAP

Route::get('google-autocomplete', [GoogleController::class, 'index']);
