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
    protected $guarded = [];

    /**
     * @param Request $request
     * @return $this
     *
     */
    public function filter(Request $request)
    {
        return $this;
    }

    /**
     * @param $data
     * @return static
     */
    public static function quickSave($data)
    {
        return (new static)->create($data);
    }

    public static function upsart(array $filds, array $data = [])
    {
        $row = static::firstOrNew($filds);

        foreach ($data as $k => $v) {
            $row->{$k} = $v;
        }


        $row->save();


        return $row;
    }

    /**3
     * @param $data
     * @return static
     */
    public static function quickUpdate($data)
    {
        $row = (new static)->findOrFail($data['id']);
        $row->update($data);
        return $row;
    }

    public static function quickDelete($id)
    {
        return (new static)->destroy($id);
    }

    public static function checkBeforDelete(BaseModel $model, $col, $id)
    {

        //  this check if model has col in other tabel
        //  if it return number larger than  0
        //  it abort mission
        //  and return 0 as parent

        if ($model->where($col, $id)->count())
            return 0;
        return self::quickDelete($id);
    }

    public function getTableColumns($exeptions = [])
    {

        $arr = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());

        foreach ($exeptions as $col) {
            if (($key = array_search($col, $arr)) !== false) {
                unset($arr[$key]);
            }
        }
        return $arr;
    }

}