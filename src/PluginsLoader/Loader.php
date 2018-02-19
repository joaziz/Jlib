<?php

namespace Jlib\PluginsLoader;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 18/02/18
 * Time: 12:08 م
 */
use File;
use Jlib\JlibServiceProvider;
use Jlib\Misc\ClassModifier;
use Jlib\ServiceProvider\LoadModule;


class Loader
{

    private static $_classes;
    private static $_pluginPath;

    public static function load(JlibServiceProvider $provider, $pluginsPath)
    {
       // LoadModule::make($provider,$pluginsPath)->load();


        self::$_pluginPath = $pluginsPath;
    }


    public static function getPluginsClasses($scope)
    {
        self::$_classes = [];

        foreach (File::directories(self::$_pluginPath) as $directory) {

            $file = $directory . DIRECTORY_SEPARATOR . "Loader.php";
            $namespace = ClassModifier::extractNamespaceFromFile($file);
            self::$_classes[] = $namespace . "\\Loader:$scope";
        }
//dd(self::$_classes);
        return self::$_classes;
    }

}