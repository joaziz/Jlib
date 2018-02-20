<?php

namespace Jlib\JModules\AdminAuth\Models;


use Illuminate\Http\Request;
use Jlib\Auth\Contracts\UserModel;
use Jlib\Model\BaseModel;

/**
 * @property mixed active
 */
class Admin extends BaseModel implements UserModel
{


    public function getPermissions(): array
    {
        return [];
    }

    /**
     * return array of login inpts
     * ex [email,username]
     * @return array
     */
    public function getLoginKeys(): array
    {
        return ["email", "username"];
    }

    public function passwordMatched(Request $request)
    {
        return \Hash::check($request->password,$this->password);
    }

    public function isActive()
    {
        return $this->active;
    }

    public function makeForgetPassword(): bool
    {
        return false;
    }

    public function reActiveUserAfterForgetPassword(): bool
    {
        return false;
    }

    public function getUserByToken($token)
    {
        return false;
    }

    public function setNewPassword($password)
    {
        return false;
    }

    public function isTokenExpire(): bool
    {
        return false;
    }
}