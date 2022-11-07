<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomerController;

// HOME PAGE

Route::get('/', function(){
    return view('components.layout-public.index');
});

// LOGIN

Route::get('/login', function () {
    return view('auth.login')->name('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// USER INDEX

Route::get('/bienvenido', function(){
    return view('components.layout-user.index');
});


// EVENTS

Route::get('/calendar', [EventController::class, 'index']);
Route::post('/calendarAjax', [EventController::class, 'ajax']);
