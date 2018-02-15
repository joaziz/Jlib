<?php

use Jlib\Auth\AuthRoute;
use Jlib\JModules\AdminAuth\Controllers\Admin\AdminAuthController;


Route::group(["middleware" => "web"], function () {
    AuthRoute::setScopeDomainAndRoute(JConfig()["adminAuth"]["scopeDomain"], AdminAuthController::class);
});