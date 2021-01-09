<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (empty($roles)) {
            return $next($request);
        }
        $currentUser = auth()->user();

        if (in_array(ROLES[$currentUser->role], $roles)) {
            return $next($request);
        }
        abort(403);
    }
}
