<?php

use App\Models\Snack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\TrainrouteController;
use App\Models\Rate;

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


    Route::get('dropdownlist',[DataController::class, 'getCountries'])->name('dropdownlist');
    Route::get('dropdownlist/getstates/{id}', [DataController::class, 'getStates']);

    Route::view('/javascripts', 'javascripts.index');
});
