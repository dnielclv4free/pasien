<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Illuminate\Support\Facades\Auth;


class AuthenticateWithJwtCookie extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->cookie('token');
            if (!$token) {
                return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
            }

            $user = JWTAuth::setToken($token)->authenticate();

            Auth::login($user, false);

        } catch (TokenExpiredException $e) {

            return redirect()->route('login')->with('error', 'Sesi Anda telah berakhir, silakan login kembali.');
        } catch (JWTException $e) {

            return redirect()->route('login')->with('error', 'Terjadi masalah dengan sesi Anda.');
        }

        return $next($request);
    }
}
