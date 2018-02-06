<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 06/02/18
 * Time: 03:20 م
 */


if (function_exists("_T")) {
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


if (function_exists("JConfig")) {
    /**
     * @param $key
     * @param array $replace
     * @param null $locale
     * @return array|null|string
     */
    function JConfig()
    {
        return require "Config.php";
    }

}


