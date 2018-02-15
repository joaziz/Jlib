<?php
/**
 * Created by PhpStorm.
 * User: EngShokry
 */

namespace Modules\Menu\Controllers\Admin;


use Module\Validator\BaseValidation;

class Validator extends BaseValidation
{
    protected function currentRoute()
    {
        return "admin/menus";
    }

    public function rules()
    {
        if ($this->is($this->currentRoute()))
            return $this->createValidate();

        if ($this->is($this->currentRoute() . "/*"))
            return $this->editValidate();

        //        -------------------
        return [];
    }

    private function editValidate()
    {
        return [
            'name'=>'required|min:10'
            ,'link'=>'required'
            
        ];
    }

    private function createValidate()
    {
        return [
            'name'=>'required|min:10'
            ,'link'=>'required'
            
        ];
    }


}