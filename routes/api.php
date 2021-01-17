<?php

use App\Http\Controllers\AuthControoler;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthControoler::class, 'register']);
    Route::post('login', [AuthControoler::class, 'login']);
    Route::post('logout', [AuthControoler::class, 'logout']);
    Route::get('user', [AuthControoler::class, 'me']);
});
