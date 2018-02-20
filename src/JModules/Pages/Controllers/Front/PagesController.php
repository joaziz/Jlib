<?php

namespace Jlib\JModules\Pages\Controllers\Front;

use Jlib\Controller\BaseController;

use Jlib\JModules\Pages\Models\Page as Model;

class PagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index($slug)
    {

        $page = Model::getBySlug($slug);

        if (!$page)
            return response()->view("Jlib::errors.404")->setStatusCode(404);

        return response()->make($page);


    }

}
