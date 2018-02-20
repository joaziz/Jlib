<?php
/**
 * Created by PhpStorm.
 * User: EngShokry
 */
namespace Jlib\JModules\Pages\Controllers\Admin;

use Illuminate\Http\Request;
use Jlib\JModules\Pages\Models\Page;

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
        $data = $this->request->only('title','content','status','meta','slug','template_id','publish_date','css','js');
        $data['slug'] = (!$data['slug']) ? Page::Generation_url($data['title']) :trim($data['slug'],'/');
        return $data;
    }

    public function getDataForEdit()
    {
        $data = $this->request->only('id','title','content','status','meta','slug','template_id','publish_date','css','js');
        $data['slug'] = (!$data['slug']) ? Page::Generation_url($data['title']) :trim($data['slug'],'/');
        return $data;
    }
}