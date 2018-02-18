<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13/02/18
 * Time: 05:31 م
 */

namespace Jlib\Auth\Middleware;


use Illuminate\Http\Request;
use Jlib\JModules\Log\Models\Log;

class AccessLog
{
    public function handle(Request $request, \Closure $next)
    {
        Log::insertNewRecord($request);
        return $next($request);
    }
}