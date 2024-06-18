<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiRefEqInfoController;

Route::resource('si_ref_eq_infos', SiRefEqInfoController::class);

Route::get('/', function () {
    return view('welcome');
});
