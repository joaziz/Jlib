<?php

namespace Jlib\Plugins\Log;

use Illuminate\Http\Request;
use Jlib\JModules\Log\Models\Log;
use Jlib\PluginsLoader\PluginLoaderInterface;

class Loader implements PluginLoaderInterface
{

    public function handle(Request $request, \Closure $next, $scope = null)
    {
        Log::insertNewRecord($request);
        return $next($request);
    }
}