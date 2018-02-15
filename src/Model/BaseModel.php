<?php

namespace Jlib\Model;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 11/02/18
 * Time: 12:11 م
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseModel extends Model
{
    /**
     * @param Request $request
     * @return $this
     *
     */
    public function filter(Request $request)
    {
        return $this;
    }
}