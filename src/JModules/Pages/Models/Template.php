<?php

namespace Jlib\JModules\Pages\Models;


use Illuminate\Http\Request;
use Jlib\Model\BaseModel;

class Template extends BaseModel
{

    protected $hidden = [];
    protected $table = 'templates';
    protected $fillable = ['title','content'];

}