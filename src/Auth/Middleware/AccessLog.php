<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13/02/18
 * Time: 05:31 م
 */

namespace Jlib\Auth\Middleware;


use Illuminate\Http\Request;

class AccessLog
{
    public function handle(Request $request, \Closure $next)
    {
//        dump([
//            "username" => "user name or guest",
//            "ip" => $request->ip(),
//            "url" => $request->url(),
//            "queryString" => $request->getQueryString(),
//            "time" => time(),
//        ]);

        return $next($request);
    }
}