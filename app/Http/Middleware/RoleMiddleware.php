<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // If the user is not authenticated or their role doesn't match
            return redirect('/unauthorized'); // Redirect to unauthorized page
        }

        return $next($request);
    }
}
