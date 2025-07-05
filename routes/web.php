<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sectcontroller;
use App\Http\Middleware\isLogin;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[Sectcontroller::class,'login'])->name('sect.login');
Route::get('/register',[Sectcontroller::class,'register'])->name('sect.register');

Route::group(['isLogin'],function($router){
    Route::get('/dashboard',[Sectcontroller::class,'dashboard'])->name('sect.dashboard');
});
