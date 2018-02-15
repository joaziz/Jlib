<?php

\Jlib\Auth\AuthRoute::addMoreAuthRoutes(JConfig()["adminAuth"]["scopeDomain"], function () {
    Route::resource('menus', \Jlib\JModules\Menus\Controllers\Admin\MenusController::class);
});
