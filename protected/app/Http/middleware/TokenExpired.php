<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class TokenExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->token() !== $request->input('_token')) {
            return response()->json(['message' => 'Token CSRF tidak valid atau telah kedaluwarsa'], 419);
        }
        return $next($request);
    }
}
