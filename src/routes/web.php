<?php

use Illuminate\Support\Facades\Route;
use Laramons\Laramons\Http\Controllers\AuthController;

Route::group(['middleware' => ['web']], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
