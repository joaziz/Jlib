<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 14/02/18
 * Time: 04:25 م
 */

namespace Jlib\Auth\Middleware;


use Illuminate\Http\Request;
use Jlib\Auth\AuthenticatedUser;

class InitAuth
{
    public function handle(Request $request, \Closure $next, $scope)
    {

        AuthenticatedUser::setEndFix($scope);
        return $next($request);
    }
}