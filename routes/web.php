<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;

Route::name("dashboard.")->prefix("/dashboard")->group(function () {
    Route::resource("posts", AdminPostController::class)->names("posts");
});

Route::name("views.")->group(function () {
    Route::view('/', "welcome")->name("home");

    Route::middleware(["guest"])->group(function () {
        Route::get('/login', [LoginController::class, "index"])->name("login");
        Route::get('/register', [RegisterController::class, "index"])->name("register");
        Route::get('/forgot_password', [ForgotPasswordController::class, "index"])->name("forgot_password");
    });
});

Route::middleware(["guest"])->name("password.")->group(function () {
    Route::get('/reset-password/{token}', [ResetPasswordController::class, "index"])->name('reset');
    Route::post('/reset-password', [ResetPasswordController::class, "reset_password"])->name('update');
});

Route::prefix("/auth")->name("auth.")->group(function(){
    Route::middleware(["auth"])->group(function () {
        Route::get('/logout', [LoginController::class, "logout"])->name("logout");
    });

    Route::middleware(["guest"])->group(function () {
        Route::post('/login', [LoginController::class, "login"])->name("login");
        Route::post('/register', [RegisterController::class, "register"])->name("register");
        Route::post('/forgot_password', [ForgotPasswordController::class, "forgot_password"])->name("forgot_password");
    });
});
