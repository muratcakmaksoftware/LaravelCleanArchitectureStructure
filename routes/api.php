<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function(){
    Route::post("register", [AuthController::class, 'register'])->name('auth.register');
    Route::post("login", [AuthController::class, 'login'])->name('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function(){

});
