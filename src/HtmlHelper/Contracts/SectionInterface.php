<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 12/02/18
 * Time: 03:09 م
 */

namespace Jlib\HtmlHelper\MenuMaker\Contracts;


interface SectionInterface
{
    public function set($name, $menu);
}