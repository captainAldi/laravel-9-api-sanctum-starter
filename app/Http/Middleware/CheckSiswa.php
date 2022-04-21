<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->user()->role != 'siswa') {
            $pesan = "You're not a Siswa !";

            return response()->json([
                'message' => $pesan
            ], 401);
            
        } else {
            return $next($request);
        }
        
    }
}
