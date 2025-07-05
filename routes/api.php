<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register', [Authcontroller::class, 'registerApi'])->name('api.register');
    Route::post('login', [Authcontroller::class, 'loginApi'])->name('api.login');

    Route::group(['middleware' => 'auth:api'], function($router){
        Route::post('logout', [Authcontroller::class, 'logoutApi'])->name('api.logout');
        Route::post('refresh', [Authcontroller::class, 'refresh'])->name('api.refresh');
        Route::post('me', [Authcontroller::class, 'me'])->name('api.me');
    });
});
