<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        } else {
            // Jika pengguna tidak memiliki peran yang diizinkan, redirect ke halaman lain atau tampilkan pesan error
            return redirect()->back()->with('danger', 'Kamu tidak mempunyai akses ke halaman.');
        }
    }
}
