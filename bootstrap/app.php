<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\isLogin;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /* $middleware->append(isLogin::class); */
        /* $middleware->alias([ */
        /*     'isAdmin'=>\App\Http\Middleware\verifyadmin::class, */
        /* ]); */
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
