<?php

namespace Jlib\Controller;

use App\Http\Controllers\Controller;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 11/02/18
 * Time: 12:09 م
 */
class BaseController extends Controller
{

    public function view(array $data = [], $view)
    {

        $data["scope"] = self::getScope();
        $data["module"] = self::getModule($this);

        $currentView = ($view) ? $view : "";

        return view($currentView, $data);


    }

    public static function getScope()
    {
        return JConfig()["adminAuth"]["scopeDomain"];
    }

    public static function getModule($class)
    {
        return strtolower(getControllerNameFromClass($class));

    }
}