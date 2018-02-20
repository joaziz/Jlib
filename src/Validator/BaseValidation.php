<?php

namespace Jlib\Validator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of BaseValidation
 *
 * @author jooaziz
 */
Abstract class BaseValidation extends FormRequest
{

    protected $myUrl;

    public function authorize()
    {
        return true;
    }

    abstract protected function currentRoute();
}