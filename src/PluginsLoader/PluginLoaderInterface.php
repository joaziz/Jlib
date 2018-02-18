<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 18/02/18
 * Time: 02:01 م
 */

namespace Jlib\PluginsLoader;


use Illuminate\Http\Request;

interface PluginLoaderInterface
{

    public function handle(Request $request, \Closure $next);

}