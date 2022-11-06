<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomerController;


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

// Ruta inicio

Route::get('/', function(){
    return view('components.layout-public.index');
});

// Rutas Login

Route::get('/login', function () {
    return view('auth.login')->name('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Rutas User

Route::get('/bienvenido', function(){
    return view('components.layout-user.index');
});

// RUTAS ADMIN

Route::get('/empleados', function(){
    return view('employee.');
});

// Ruta clientes

Route::get('/form', function(){
    return view('customer.index');
});

Route::get('/form/new-customer', [CustomerController::class, 'create']);
Route::post('/form/new-customer', [CustomerController::class, 'create'])->name('newCustomer');
