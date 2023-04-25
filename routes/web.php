<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('index', 'index');
    Route::post('index', 'store');
    Route::post('group-store', 'groupStore');
});
