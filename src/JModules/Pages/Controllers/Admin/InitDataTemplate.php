<?php
/**
 * Created by PhpStorm.
 * User: EngShokry
 */
namespace Jlib\JModules\Pages\Controllers\Admin;

use Illuminate\Http\Request;

class InitDataTemplate
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
        $data = $this->request->only('title','content');
        return $data;
    }

    public function getDataForEdit()
    {
        $data = $this->request->only('id','title','content');
        return $data;
    }
}