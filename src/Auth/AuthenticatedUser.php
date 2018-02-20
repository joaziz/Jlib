<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 14/02/18
 * Time: 04:30 م
 */

namespace Jlib\Auth;


use Jlib\Auth\Contracts\UserModel;
use Session;

class AuthenticatedUser
{
    private static $instance;
    private static $endFix;
    private $userKey;

    public static function setEndFix($endFix)
    {
        self::$endFix = $endFix;
    }

    public static function getEndFix()
    {
        return self::$endFix;
    }

    /**
     * @return static
     */
    public static function getInstance()
    {

        if (self::$instance)
            return self::$instance;

        self::$instance = new static(self::$endFix);

        return self::$instance;
    }


    public static function setUser(UserModel $userModel)
    {
         self::getInstance()->_setUser($userModel);
    }

    public static function isLogin()
    {
        return self::getInstance()->_isLogin();
    }

    public static function logout()
    {
        return self::getInstance()->_logout();
    }

    public static function getUser()
    {
        return self::getInstance()->_getUser();
    }
//-----------------------------------------------------
//-----------------------------------------------------
//-----------------------------------------------------
//-----------------------------------------------------
//-----------------------------------------------------

    private function __construct($endFix)
    {
        $this->userKey = env("APP_KEY") . $endFix;
    }

    private function _setUser(UserModel $userModel)
    {

        Session::put($this->userKey, $userModel);

    }


    private function _isLogin()
    {
        return (Session::has($this->userKey) && \Session::get($this->userKey));
    }

    private function _logout()
    {
        Session::forget($this->userKey);
    }

    private function _getUser()
    {
        return Session::get($this->userKey);
    }
}