<?php

namespace Jlib\Auth\Middleware;

use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 07:30 م
 */
class GuestUser
{
    public function handle(Request $request, \Closure $next,$scope)
    {

        return $next($request);
    }
}