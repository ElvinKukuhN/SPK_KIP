<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna telah login dan memiliki role 'admin'
        if ($request->user() != null) {
            if ($request->user()->role == 1) {
                return $next($request);
            }

            if ($request->user()->role == 2) {
                return redirect('/Hasil-Data');
            }
        }

        // Redirect atau berikan respons sesuai kebutuhan jika pengguna tidak memiliki hak akses sebagai admin
        return redirect('login')->with('error', 'Anda tidak memiliki hak akses sebagai admin.');
    }
}
