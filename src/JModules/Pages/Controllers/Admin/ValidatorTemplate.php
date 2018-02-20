<?php
/**
 * Created by PhpStorm.
 * User: EngShokry
 */

namespace Jlib\JModules\Pages\Controllers\Admin;

use Jlib\Validator\BaseValidation;

class ValidatorTemplate extends BaseValidation
{
    protected function currentRoute()
    {
        return "panel/templates";
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
            'title'=>'required|min:5'
            ,'content'=>'required|min:5'
            
        ];
    }

    private function createValidate()
    {
        return [
            'title'=>'required|min:5'
            ,'content'=>'required|min:5'
            
        ];
    }


}