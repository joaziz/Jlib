<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 05:27 م
 */

namespace Jlib\JModules\AdminAuth;




use Jlib\Auth\AuthRoute;
use Jlib\JlibServiceProvider;
use Route;

class AdminAuthLoader
{
    public static function init(JlibServiceProvider $provider, array $configs = [])
    {

        $provider->JlibLoadViews(__DIR__ . DIRECTORY_SEPARATOR . "views", "JAuth");

        Route::group(["middleware" => "web"], function () use ($configs) {
            AuthRoute::setScopeDomainAndRoute($configs["adminAuth"]["scopeDomain"], AdminAuthController::class);
        });

    }
}

