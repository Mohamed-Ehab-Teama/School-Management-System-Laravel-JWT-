<?php

namespace App\Http\Middleware\Role;

use App\Helpers\Helpers;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        $user = auth('api')->user();

        if( !$user || !in_array($user->role, $roles) )
        {
            return Helpers::sendResponse(403, 'Forbiden Access', []);
        }

        return $next($request);
    }
}
