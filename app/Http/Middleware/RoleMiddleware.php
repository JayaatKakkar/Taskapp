<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    { error_log($request);
        // if (!$request->user()) {
        //     return response()->json(['error' => 'Unauthenticated'], 500);
        // }

        // Check if the user's role matches the required role for this route
        if ($request->user()->role !== "admin") {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
       
        return $next($request);
    }
}
