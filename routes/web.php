<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sectcontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateWithJwtCookie;
use App\Http\Middleware\verifyadmin;

Route::get('/', function () {
    return view('welcome');
});

//belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [Sectcontroller::class, 'login'])->name('login');
    Route::post('/login', [Authcontroller::class, 'loginWeb'])->name('login.perform');
    Route::get('/register', [Sectcontroller::class, 'register'])->name('register');
    Route::post('/register', [Authcontroller::class, 'registerWeb'])->name('register.perform');
});


//sudah login
Route::middleware(AuthenticateWithJwtCookie::class)->group(function () {
    Route::get('/dashboard', [Sectcontroller::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [Authcontroller::class, 'logoutWeb'])->name('logout');
    Route::middleware(verifyadmin::class)->group(function(){
        Route::get('/dashboard/{user}/data',[Authcontroller::class,'cari'])->name('cari');
        Route::get('user',[UserController::class,'index'])->name('user.index');
        Route::get('user/create',[UserController::class,'create'])->name('user.create');
        Route::post('user',[UserController::class,'store'])->name('user.store');
        Route::get('user/{user}/edit',[UserController::class,'edit'])->name('user.edit');
        Route::put('user/{user}',[UserController::class,'update'])->name('user.update');
        Route::delete('user/{user}',[UserController::class, 'destroy'])->name('user.destroy');
    });
});
