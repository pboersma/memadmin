<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedMiddleware
{
    /**
     * Validate if current user session is authenticated.
     *
     * @param  Request $request
     * @param  Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('user_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
