<?php
/**
 * Created by PhpStorm.
 * User: EngShokry
 */
namespace Modules\Menu\Controllers\Admin;


use Illuminate\Http\Request;

class InitData
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getDataForCreate()
    {
        $data = $this->request->only('name','link','icon','parent_id','order');
        return $data;
    }

    public function getDataForEdit()
    {
        $data = $this->request->only('name','icon','parent_id','order');
        return $data;
    }
}