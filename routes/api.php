<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Users\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function(){
    Route::post("register", [AuthController::class, 'register'])->name('auth.register');
    Route::post("login", [AuthController::class, 'login'])->name('auth.login');
    Route::post("authorized-check", [AuthController::class, 'authorizedCheck'])->name('auth.authorized_check');
    Route::any("unauthorized", [AuthController::class, 'unauthorized'])->name('auth.unauthorized');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function(){
    Route::group(['prefix' => 'auth'], function(){
        Route::post("logout", [AuthController::class, 'logout'])->name('auth.logout');
    });

    Route::resource("users", UserController::class)->only(['index', 'edit', 'store', 'update', 'destroy']);
    Route::put("users/{user}/restore", [UserController::class, 'restore'])->name('users.restore');
    Route::get("users/datatables", [UserController::class, 'datatables'])->name('users.datatables');
    Route::get("users/trashed-datatables", [UserController::class, 'trashedDatatables'])->name('users.trashed_datatables');
});
