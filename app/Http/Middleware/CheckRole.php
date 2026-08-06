<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
{
    if (!auth()->check()) {
        return redirect('/login');
    }

    $userRole = strtolower(trim(auth()->user()->role));
    $role = strtolower(trim($role));

    if ($userRole !== $role) {
        abort(403);
    }

    return $next($request);
    }
}