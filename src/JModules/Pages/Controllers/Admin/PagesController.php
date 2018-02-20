<?php

namespace Jlib\JModules\Pages\Controllers\Admin;

use Jlib\Controller\BaseController;

use Jlib\JModules\Pages\Models\Page as Model;
use Jlib\JModules\Pages\Models\Template;

class PagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index()
    {
        return $this->view(["rows" => Model::paginate()], "pages::admin.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        $row = new Model();

        return $this->view(["row" => $row,'template'=>Template::pluck('title','id')->toArray()], "pages::admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Validator $request)
    {
        $init = new InitData($request);
        Model::quickSave($init->getDataForCreate());
        flash()->success('Your Item Created');
        return redirect()->to(self::getScope().'/'.self::getModule($this));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
        $row = Model::find($id);
        return $this->view(["row" => $row], "pages::admin.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        return $this->view(["row" => Model::findOrFail($id),'template'=>Template::pluck('title','id')->toArray()], "pages::admin.edit");
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Validator $request)
    {
        $init = new InitData($request);
        Model::quickUpdate($init->getDataForEdit());
        flash()->success('Your Item Updated');
        return redirect()->to(self::getScope().'/'.self::getModule($this));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destory($id)
    {
        $row = Model::find($id);
        $row->delete();
        flash()->success('Your Item Deleted');
        return redirect()->to(self::getScope().'/'.self::getModule($this));
    }


}
