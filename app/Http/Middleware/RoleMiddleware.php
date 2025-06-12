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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $sessionRoles = session('roles');

        if ($sessionRoles) {
            $names = array_map(fn($role) => $role->name, $sessionRoles);

            foreach ($roles as $role) {
                if (in_array($role, $names, true)) {
                    return $next($request);
                }
            }
        }

        abort(403, 'Onvoldoende rechten.');
    }
}
