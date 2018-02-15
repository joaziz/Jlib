<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 06/02/18
 * Time: 03:20 م
 */


if (!function_exists("_T")) {
    /**
     * @param $key
     * @param array $replace
     * @param null $locale
     * @return array|null|string
     */
    function _T($key, $replace = [], $locale = null)
    {

        return __($key, $replace, $locale);
    }

}


if (!function_exists("JConfig")) {
    /**
     * @param $key
     * @param array $replace
     * @param null $locale
     * @return array|null|string
     */
    function JConfig()
    {
        static $configs = null;

        if ($configs === null)
            $configs = require "Config.php";


        return $configs;
    }

}

function getControllerNameFromClass($class)
{
    $parts = explode("\\", get_class($class));
    return str_replace("Controller", "", end($parts));
}
