<?php

namespace Jlib\Auth\Middleware;

use Illuminate\Http\Request;


class AuthUser
{
    public function handle(Request $request, \Closure $next, $scope)
    {

        return $next($request);
    }
}