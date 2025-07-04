<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sectcontroller;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[Sectcontroller::class,'login'])->name('sect.login');
Route::get('/register',[Sectcontroller::class,'register'])->name('sect.register');
