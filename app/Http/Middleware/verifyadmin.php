<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role; // Ditambahkan

class verifyadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminRole = Role::where('role_name', 'admin')->first();

        if (!$adminRole) {
            return redirect('/dashboard');
        }

        if ($request->user()->role_id !== $adminRole->id) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
