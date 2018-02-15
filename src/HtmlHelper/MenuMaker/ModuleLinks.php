<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 12/02/18
 * Time: 02:52 م
 */

namespace Jlib\HtmlHelper\MenuMaker;

use Illuminate\Support\Collection;
use Jlib\HtmlHelper\MenuMaker\Contracts\MenuMaker;


/**
 * Class ModuleLinks
 * @package Jlib\HtmlHelper\MenuMaker
 */
class ModuleLinks implements MenuMaker
{

    private static $_collection = null;
    private static $_instance = null;
    private $section;


    public static function getAsArray()
    {
        return self::$_collection;
    }


    public function put($directory, $link)
    {
        if (self::$_collection == null)
            self::$_collection = [];

        if (!isset(self::$_collection[$this->section]))
            self::$_collection[$this->section] = [];

        self::$_collection[$this->section][$directory] = ["name" => $directory, "link" => $link];
    }


    public static function instance($sectionName = null): MenuMaker
    {
        if (!self::$_instance)
            self::$_instance = new static();


        self::$_instance->setSection($sectionName);

        return self::$_instance;
    }

    private function setSection($sectionName = "default")
    {
        $this->section = $sectionName;
    }
}