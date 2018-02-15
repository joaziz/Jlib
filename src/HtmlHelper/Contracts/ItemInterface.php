<?php

namespace Jlib\HtmlHelper\MenuMaker\Contracts;
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 08/02/18
 * Time: 04:20 م
 */

interface ItemInterface
{
    public function get(): string ;

    public static function setLinks():self ;
}