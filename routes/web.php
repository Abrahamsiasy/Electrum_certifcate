<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiRefEqInfoController;

Route::resource('si_ref_eq_infos', SiRefEqInfoController::class);
Route::get('/get-sensor-ids-by-eq-name', [SiRefEqInfoController::class, 'getSensorIdsByEqName'])->name('getSensorIdsByEqName');
Route::get('/get-div-rows-by-sensor-id', [SiRefEqInfoController::class, 'getDivRowIdsByEqName'])->name('getDivRowIdsByEqName');
Route::post('/si_ref_eq_infos_table', [SiRefEqInfoController::class, 'siRefEqInfosTable'])->name('si_ref_eq_infos_table');

Route::post('/si-ref-eq-infos', [SiRefEqInfoController::class, 'siRefEqInfosTable'])->name('si-ref-eq-infos.table');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/users', [UsersController::class, 'index'])->name('users.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
