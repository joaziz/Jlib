<?php

namespace Jlib\Auth;

use Jlib\Auth\Contracts\AuthControllerInterface;
use Exception;
use Jlib\Auth\Middleware\AccessLog;
use Jlib\Auth\Middleware\AuthUser;
use Jlib\Auth\Middleware\GuestUser;
use Jlib\Auth\Middleware\InitAuth;
use Jlib\PluginsLoader\Loader;
use Route;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 05:26 م
 */
class AuthRoute
{
    /**
     * @var array
     */
    private static $domains = [];
    private static $lastDomainName;
    private static $controller;


    /**
     * @param $scope
     * @param $controller
     */
    public static function setScopeDomainAndRoute($scope, $controller)
    {
        self::setScopeDomain($scope, $controller);
        self::route();
    }

    /**
     * @param $scope
     * @param $controller
     * @throws Exception
     */
    public static function setScopeDomain($scope, $controller)
    {

        if (!((new $controller) instanceof AuthControllerInterface))
            throw new Exception("Class '$controller' must be instance of 'AuthControllerInterface' ");

        self::$domains[] = ["scope" => $scope, "controller" => $controller];
        self::$lastDomainName = $scope;
        self::$controller = $controller;
    }

    /**
     *
     */
    public static function route()
    {
        self::addDomainRoutes(self::$lastDomainName, self::$controller);
    }

    /**
     * @param $scope
     * @param $controller
     */
    private static function addDomainRoutes($scope, $controller)
    {


        self::addMoreAuthRoutes($scope, function () use ($controller) {
            Route::get("/", "\\" . $controller . "@dashboard");
            Route::get("/auth/logout", "\\" . $controller . "@getLogout");
        });

        self::addMoreGuestRoutes($scope, function () use ($controller) {
            Route::get("/auth/login", "\\" . $controller . "@getLogin");
            Route::post("/auth/login", "\\" . $controller . "@postLogin");

            Route::get("/auth/sing-up", "\\" . $controller . "@getSingUp");
            Route::post("/auth/sing-up", "\\" . $controller . "@postSingUp");

            Route::get("/auth/forget-password", "\\" . $controller . "@getForgetPassword");
            Route::post("/auth/forget-password", "\\" . $controller . "@postForgetPassword");
        });
    }

    /**
     * @param $scope
     * @param \Closure $closure
     */
    public static function addMoreAuthRoutes($scope, \Closure $closure)
    {

        self::addRouteToGroup($scope, function () use ($scope, $closure) {
            Route::group(["middleware" => AuthUser::class . ":" . $scope], function () use ($closure) {
                $closure();
            });
        });
    }

    /**
     * @param $scope
     * @param \Closure $closure
     */
    public static function addMoreGuestRoutes($scope, \Closure $closure)
    {
        self::addRouteToGroup($scope, function () use ($scope, $closure) {
            \Route::group(["middleware" => GuestUser::class . ":" . $scope], function () use ($closure) {
                $closure();
            });
        });

    }

    private static function addRouteToGroup($scope, \Closure $closure)
    {

        $baseMiddleware = [
            "web",
            InitAuth::class . ":$scope", // init auth module for project
            AccessLog::class // set access log
        ];

        /*
         *  load plugin middleware and pass scope to it
         */
        $pluginsMiddleware = Loader::getPluginsClasses($scope);

        /*
         * marge both of tow middleware groups;
         */
        $middleware = array_merge($baseMiddleware, $pluginsMiddleware);

        \Route::group(["middleware" => $middleware, "prefix" => $scope], function () use ($closure) {
            $closure();
        });
    }
}