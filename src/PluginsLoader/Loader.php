<?php

namespace Jlib\PluginsLoader;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 18/02/18
 * Time: 12:08 م
 */
use File;
use Jlib\Misc\ClassModifire;
use Jlib\Misc\UUID;

class Loader
{

    private static $_classes;
    private static $_pluginPath;

    public static function load($pluginsPath)
    {
        self::$_pluginPath = $pluginsPath;
    }


    public static function getPluginsClasses($scope)
    {
        self::$_classes = [];

        foreach(File::directories(self::$_pluginPath) as $directory) {
            dd(UUID::create());
           $file = $directory.DIRECTORY_SEPARATOR."Loader.php";
           $namespace =ClassModifire::extractNamespaceFromFile($file);
           dd($namespace);

        }

        return self::$_classes;
    }

}