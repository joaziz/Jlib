<?php

namespace Jlib\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 13/02/18
 * Time: 01:24 م
 */

use File;
use Jlib\HtmlHelper\MenuMaker\Contracts\MenuMaker;
use Jlib\JlibServiceProvider;
use SplFileInfo;

class LoadModule
{

    private $dir;
    private $isBelongToMenu = false;
    private $menuMaker = false;
    private $menuName;

    /**
     * @var JlibServiceProvider
     */
    private $provider;

    public static function make(JlibServiceProvider $provider, $dir)
    {
        return new static($provider, $dir);
    }

    public function __construct(JlibServiceProvider $provider, $dir)
    {

        $this->dir = $dir;

        $this->provider = $provider;
    }

    public function load()
    {
        $modulesDirs = File::directories($this->dir);

        foreach ($modulesDirs as $dir) {
            $dirParts = explode(DIRECTORY_SEPARATOR, $dir);
            $directory = end($dirParts);

            if ($conf = $this->moduleIsActive($dir)) {

                $this->loadModuleRoutes($directory);
                $this->loadModuleViews($directory);
                $this->loadModuleMigrations($directory);

                if ($this->isBelongToMenu)
                    $this->addToMenu($directory);

            }

        }
    }


    private function loadModuleRoutes($directory)
    {

        $routeDirectory = $this->dir . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . "routes";
        $routesFiles = File::allFiles($routeDirectory);

        /** @var SplFileInfo $file */
        foreach ($routesFiles as $file)
            $this->provider->jlibLoadRoutes($routeDirectory . DIRECTORY_SEPARATOR . $file->getFilename());
    }

    /**
     * @return mixed
     */
    public function getMenuName()
    {
        return $this->menuName;
    }

    /**
     * @param $menuName
     * @return $this
     */
    public function setMenuName($menuName)
    {
        $this->menuName = $menuName;
        return $this;
    }

    private function loadModuleViews($directory)
    {
        $viewsDir = $this->dir . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . "views";

        if (File::exists($viewsDir))
            $this->provider->jlibLoadViews($viewsDir, strtolower($directory));

    }

    private function addToMenu($directory)
    {

        $link = JConfig()["adminAuth"]["scopeDomain"];
        $this->menuMaker->put($directory, url("$link/" . str_slug($directory)));
    }

    private function loadModuleMigrations($directory)
    {
        $migratePath = $this->dir . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . "migrate";

        if (File::exists($migratePath))
            $this->provider->jlibMigrationLoad($migratePath);

    }

    private function moduleIsActive($dir)
    {
        $file = $dir . "/module.json";
        if (File::exists($file)) {
            $json = json_decode(File::get($file));
            return ($json->active) ? $json : false;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isMenuMaker(): bool
    {
        return $this->menuMaker;
    }

    /**
     * @param MenuMaker $menuMaker
     * @return $this
     */
    public function setMenuMaker(MenuMaker $menuMaker)
    {
        $this->menuMaker = $menuMaker;
        $this->isBelongToMenu = true;
        return $this;
    }


}