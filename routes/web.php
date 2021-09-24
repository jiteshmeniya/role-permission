<?php

use App\Models\Rate;
use App\Models\Snack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TrainrouteController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\MemoInternal\MailboxController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
    Route::resource('snacks',SnackController::class);
    Route::resource('trainroutes',TrainrouteController::class);
    Route::resource('rates',RateController::class);
    // Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::resource('employees', EmployeeController::class);
    Route::post('import', [EmployeeController::class, 'import'])->name('employee.import');


    Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todos.index');
    Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);
    Route::put('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
    Route::delete('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);

    Route::get('dropdownlist',[DataController::class, 'getCountries'])->name('dropdownlist');
    Route::get('dropdownlist/getstates/{id}', [DataController::class, 'getStates']);

    Route::view('/javascripts', 'javascripts.index');

    Route::view('select2','livewire.select2.home');

    Route::view('/duallistbox', 'duallistbox.index');

    Route::get('/departments', [DepartmentsController::class, 'index']);
    Route::get('/getEmployees/{id}', [DepartmentsController::class, 'getEmployees']);

    // Route::get('/employees',[EmployeeController::class, 'index']);
    Route::post('/employees/getEmployees/',[EmployeeController::class, 'getEmployees'])->name('employees.getEmployees');

    Route::get('mailboxes/compose',[MailboxController::class, 'compose'])->name('mailboxes.compose');
    Route::resource('mailboxes', MailboxController::class);
});
