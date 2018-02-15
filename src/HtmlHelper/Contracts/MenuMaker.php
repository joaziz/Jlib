<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13/02/18
 * Time: 01:38 م
 */

namespace Jlib\HtmlHelper\MenuMaker\Contracts;


interface MenuMaker
{

    public static function instance($sectionName = null): MenuMaker;

    public function put($directory, $link);
}