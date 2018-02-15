<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 14/02/18
 * Time: 04:11 م
 */

namespace Jlib\Auth;


use Jlib\Auth\Contracts\UserModel;
use Jlib\Auth\Helper\Response;

class AuthLogic
{
    /**
     * @param UserModel $userModel
     * @param \Closure|null $callback
     * @return Response
     */
    public static function login(UserModel $userModel, \Closure $callback = null)
    {
        /*
         *  set vars like request fields and user model
         */
        $request = request();
        $fields = $userModel->getLoginKeys();
        $query = $userModel;

        /*
         * make a query with all fields
         * to search on it like email username or etc ...
         */
        foreach ($fields as $feild) {
            $query = $query->orWhere($feild, $request->loginInput);
        }

        /**
         * execute query and return if user existe
         * @var UserModel $user
         */
        $user = $query->first();

        /*
         * check if user ot found and
         *  return response object with message user not found
         */
        if (!$user)
            return Response::instance(false, "user not found", null);

        /*
         * check if password not matched and
         * return response object with message wrong password
         */
        if (!$user->passwordMatched($request))
            return Response::instance(false, "invalid data", null);

        /*
         *  check if user active
         * and return response object with message user not active
         */
        if (!$user->isActive())
            return Response::instance(false, "sorry your not active please contact with administration", null);

        /*
         *  check if user expire token
         */
        if ($user->isTokenExpire())
            return Response::instance(false, "sorry your not active please contact with administration", null);
        /*
         *init response for return with
         *
         */
        $res = Response::instance(true, "welcome", $user);

        if ($callback) $callback($res);

        /*
         * set user object to to session
         */
        if ($res->getStatus())
            AuthenticatedUser::setUser($user);


        return $res;
    }

    public static function singUp()
    {
    }

    /**
     * @return Response
     */
    public static function logout()
    {
        AuthenticatedUser::logout();
        return Response::instance(true, "welcome", null);
    }


    public static function setNewPassword()
    {
    }

    public static function forgetPassword(UserModel $userModel, $prefix)
    {
        $row = @$userModel->where("email", request()->email)->first();
        if (!is_null($row) && $row->makeForgetPassword()) {
            $data = [
                "resetUrl" => url($prefix . "/auth/reset-password/$row->token"),
                "name" => $row->name
            ];
            \Mail::send(CustomViewRegister::getNameSpace() . "::emails.forgetPassword", $data, function ($mail) use ($row) {
                $mail->from(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'));
                $mail->to($row->email, @$row->name)->subject(__("admin.Your new password at") . ' ' . env('SITE_NAME'));
            });
            return (object)["status" => true, "message" => "we send you an email with reset link"];
        }
        return (object)["status" => false, "message" => "some thing wrong"];
    }

    public static function resetPassword(UserModel $userModel, $token, $prefix)
    {
        if ($row = $userModel->getUserByToken($token)) {
            return (object)["status" => true, "message" => "please insert your new password", "user" => $row];
        } else {
            return (object)["status" => false, "message" => "invalid or old token", "user" => null];
        }
    }
}