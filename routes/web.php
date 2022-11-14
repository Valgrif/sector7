<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;

// HOME PAGE

Route::get('/', function(){
    return view('components.layout-public.index');
});

// LOGIN

Route::get('/login', function () {
    return view('auth.login')->name('login');
});

Route::get('/dashboard', function () {
    return view('components.layout-user.wellcome'); //dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// USER

Route::get('/app', function(){
    return view('components.layout-user.wellcome');
})->name('logeado');

Route::post('logout',[AuthenticatedSessionController::class, 'destroy'])->name('logout');

// EVENTS

Route::get('/app/calendar', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('calendar');
Route::post('/app/calendarAjax', [EventController::class, 'ajax'])->middleware(['auth', 'verified']);

// CUSTOMER

Route::get('/app/new-customer', [CustomerController::class, 'new_form'])->middleware(['auth', 'verified'])->name('new-customer-form');
Route::post('/app/new-customer', [CustomerController::class, 'create'])->middleware(['auth', 'verified'])->name('create-customer');
Route::get('/app/customer-list', [CustomerController::class, 'list'])->middleware(['auth', 'verified'])->name('list-customer');

// REPORTS

Route::get('/app/new-report', [ReportController::class, 'new_form'])->middleware(['auth', 'verified'])->name('new-report-form');
Route::post('/app/new-report', [ReportController::class, 'create'])->middleware(['auth', 'verified'])->name('create-report');
Route::get('/app/report-list', [ReportController::class, 'list'])->middleware(['auth', 'verified'])->name('list-report');

// EMPLOYEES

Route::get('/app/new-employee', [EmployeeController::class, 'new_form'])->middleware(['auth', 'verified'])->name('new-employee-form');
Route::post('/app/new-employee', [EmployeeController::class, 'create'])->middleware(['auth', 'verified'])->name('create-employee');
Route::get('/app/employee-list', [EmployeeController::class, 'list'])->middleware(['auth', 'verified'])->name('list-employees');

