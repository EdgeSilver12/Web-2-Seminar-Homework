<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        \Log::info('User role: ' . $user->role);  // Debugging

        if ($user->role !== $role) {
            return redirect('/unauthorized');
        }

        return $next($request);
    }
}
