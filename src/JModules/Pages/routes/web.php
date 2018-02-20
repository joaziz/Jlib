<?php

Route::get('/{slug}', '\Jlib\JModules\Pages\Controllers\Front\PagesController@index');
\Jlib\Auth\AuthRoute::addMoreAuthRoutes(JConfig("adminAuth.scopeDomain"), function () {

    Route::resource('pages', '\Jlib\JModules\Pages\Controllers\Admin\PagesController');
    Route::resource('templates', '\Jlib\JModules\Pages\Controllers\Admin\TemplatesController');
});