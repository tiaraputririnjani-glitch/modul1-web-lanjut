<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailKampus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Cek apakah user sudah login dan apakah emailnya tiaraputririnjani@gmail.com
    if (auth()->check() && auth()->user()->email == 'tiaraputririnjani@gmail.com') {
        return $next($request);
    }

    // Jika emailnya beda, akses ditolak
    abort(403, 'Maaf, hanya Tiara yang punya akses untuk menghapus data ini!');
}
}
