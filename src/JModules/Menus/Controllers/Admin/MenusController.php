<?php

namespace Jlib\JModules\Menus\Controllers\Admin;

use Jlib\Controller\BaseController;

use Modules\Menus\Models\Menu as Model;

class MenusController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index()
    {
//        $data["pageTitle"] = _T("admin.menu list");
//        $data["rows"] = (new Model())->filter(request())->paginate();
        return $this->view([], "menus::Admin.index");
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

        return $this->view(["row" => $row], "menus::Admin.create");
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
        return redirect()->to("menus/");
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
        return $this->view(["row" => $row], "menus::show");
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
        return $this->view(["row" => (new Model())->findOrFail($id)], "Admin::edit");
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
        return redirect()->to("/menus");
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
        return redirect()->to("/menus");
    }


}
