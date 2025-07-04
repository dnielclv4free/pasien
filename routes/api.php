<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

Route::group(['middleware'=>'api','prefix'=>'auth'],function($router){
    Route::post('register',[Authcontroller::class,'register']);
    Route::post('login',[Authcontroller::class,'login']);
    Route::post('logout',[Authcontroller::class,'logout']);
    Route::post('refresh',[Authcontroller::class,'refresh']);
    Route::post('me',[Authcontroller::class,'me']);
});
