<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Middleware\isLogin;

Route::group(['isLogin'],function($router){
    Route::post('register',[Authcontroller::class,'register_p'])->name('auth.register_p');
    Route::post('login',[Authcontroller::class,'login_p'])->name('auth.login_p');
    Route::post('logout',[Authcontroller::class,'logout']);
    Route::post('refresh',[Authcontroller::class,'refresh']);
    Route::post('me',[Authcontroller::class,'me']);
});
