<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Middleware\isLogin;
Route::post('register-p',[Authcontroller::class,'register-p'])->name('auth.register-p');
Route::post('login-p',[Authcontroller::class,'login-p'])->name('auth.login-p');

Route::group([isLogin::class],function($router){
    Route::post('logout',[Authcontroller::class,'logout']);
    Route::post('refresh',[Authcontroller::class,'refresh']);
    Route::post('me',[Authcontroller::class,'me']);
});
