<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiRefEqInfoController;

Route::resource('si_ref_eq_infos', SiRefEqInfoController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/users', [UsersController::class, 'index'])->name('users.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
