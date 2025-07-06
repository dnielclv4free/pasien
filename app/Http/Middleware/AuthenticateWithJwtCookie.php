<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Illuminate\Support\Facades\Auth;

class AuthenticateWithJwtCookie
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->cookie('token');
            if (!$token) {
                return redirect()->route('login');
            }

            if (! $user = JWTAuth::setToken($token)->authenticate()) {
                return redirect()->route('login')->withCookie(\Cookie::forget('token'));
            }

            Auth::shouldUse('api');
            Auth::setUser($user);

        } catch (TokenExpiredException $e) {
            return redirect()->route('login')->with('error', 'Sesi Anda telah berakhir.')
                                             ->withCookie(\Cookie::forget('token'));
        } catch (JWTException $e) {
            return redirect()->route('login')->with('error', 'Sesi tidak valid.')->withCookie(\Cookie::forget('token'));
        }

        return $next($request);
    }
}
