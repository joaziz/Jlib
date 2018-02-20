<?php

namespace Jlib\Auth\Middleware;

use Illuminate\Http\Request;
use Jlib\Auth\AuthenticatedUser;


class AuthUser
{
    public function handle(Request $request, \Closure $next, $scope)
    {

        if (!($user = AuthenticatedUser::getUser()))
            return redirect()->to("$scope/auth/login");

        view()->share("authUser", $user);
        return $next($request);
    }
}