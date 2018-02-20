<?php namespace Jlib\JModules\Log\Models;

use Illuminate\Http\Request;
use Jlib\Auth\AuthenticatedUser;
use Jlib\Model\BaseModel;
use PhpParser\Node\Stmt\Static_;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 15/02/18
 * Time: 07:24 م
 */
class Log extends BaseModel
{
    public static function insertNewRecord(Request $request)
    {
        $q = $request->except("_token","password");
        $data = [
            "ip" => $request->ip(),
            "data" => $q,
            "url" => $request->fullUrl(),
            "session" => $request->session()->get("flash_notification.message"),
            "username" => @AuthenticatedUser::getUser()->username
        ];

        self::quickSave(["data" => json_encode($data)]);


    }

    public static function quickAccess()
    {
        return self::latest()->limit(5)->get()->map(function ($item) {
            $data = json_decode($item->data);
            $data->_date = (string)$item->created_at;
            return $data;
        })->toArray();
    }
}