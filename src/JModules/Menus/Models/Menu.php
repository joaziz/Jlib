<?php

namespace Modules\menus\Models;


use Illuminate\Http\Request;
use Jlib\Model\BaseModel;

class Menu extends BaseModel
{

    protected $hidden = [];
    protected $table = 'menus';
    protected $fillable = ['name','link','icon','parent_id','order'];

}