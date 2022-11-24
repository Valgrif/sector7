<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;
use App\Models\Event;

//---------- WEB ---------------------------------------------------------------------------------------------------------//

Route::get('/', function () {
    return view('components.layout-public.index');
});

//---------- LOGIN -------------------------------------------------------------------------------------------------------//

Route::get('/login', function () {
    return view(
        'auth.login',
        ['events' => Event::all()]
    )->name('login');
});

Route::get('/app', [EventController::class, 'listHome'])->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); //Cerrar sesion

//---------- CALENDAR ----------------------------------------------------------------------------------------------------//

Route::get('/app/calendar', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('calendar');
Route::post('/app/calendarAjax', [EventController::class, 'ajax'])->middleware(['auth', 'verified']);
Route::get('/app/home', [EventController::class, 'list'])->middleware(['auth', 'verified']);

//---------- CUSTOMER ----------------------------------------------------------------------------------------------------//

Route::get('/app/new-customer', [CustomerController::class, 'new_form'])->middleware(['auth', 'verified'])->name('new-customer-form');
Route::post('/app/new-customer', [CustomerController::class, 'create'])->middleware(['auth', 'verified'])->name('create-customer');
Route::get('/app/customer/{slug}', [CustomerController::class, 'show'])->middleware(['auth', 'verified'])->name('show-customer');

Route::get('/app/customer-list', [CustomerController::class, 'list'])->middleware(['auth', 'verified'])->name('list-customer');

Route::post('/app/customer-list', [CustomerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete-customer');

Route::get('/app/{customer}/edit', [CustomerController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit-customer');
Route::patch('/app/{customer}/update', [CustomerController::class, 'update'])->middleware(['auth', 'verified'])->name('update-customer');


//---------- EMPLOYEE -----------------------------------------------------------------------------------------------------//

Route::get('/app/new-employee', [RegisteredUserController::class, 'create'])->middleware(['auth', 'verified'])->name('new-employee-form');
Route::post('/app/new-employee', [RegisteredUserController::class, 'store'])->middleware(['auth'])->name('create-employee');
Route::get('/app/employee-list', [RegisteredUserController::class, 'list'])->middleware(['auth', 'verified'])->name('list-employees');
Route::post('/app/employee-list', [RegisteredUserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete-employee');
Route::get('/app/{user}/edit', [RegisteredUserController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit-employee');
Route::patch('/app/{user}/update', [RegisteredUserController::class, 'update'])->middleware(['auth', 'verified'])->name('update-employee');

//---------- REPORT -------------------------------------------------------------------------------------------------------//

Route::get('/app/new-report', [ReportController::class, 'new_form'])->middleware(['auth', 'verified'])->name('new-report');
Route::post('/app/new-report', [ReportController::class, 'create'])->middleware(['auth'])->name('create-report');
Route::get('/app/report-list', [ReportController::class, 'list'])->middleware(['auth', 'verified'])->name('list-report');
Route::post('/app/report-list', [ReportController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete-report');





