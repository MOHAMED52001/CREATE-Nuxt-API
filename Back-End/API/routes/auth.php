<?php

use App\Http\Controllers\API\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::controller(AuthController::class)->group(function () {
    //Auth Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post("user", 'user')->name("user");
        Route::post("logout", 'logout')->name("logout");
    });

    //Guest Routes
    Route::middleware('guest')->group(function () {
        Route::post("login", 'login')->name("login");
        Route::post("register", 'register')->name("register");
    });
});
