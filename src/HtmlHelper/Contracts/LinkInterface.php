<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 08/02/18
 * Time: 04:22 م
 */

namespace Jlib\HtmlHelper\MenuMaker\Contracts;


interface LinkInterface
{
    public static function set($name, $link, $icon = ""): self;

    public function getSingle(): string;

    public function getMulti(): array ;

}