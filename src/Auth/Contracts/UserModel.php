<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 07:54 م
 */

namespace Jlib\Auth\Contracts;


use Illuminate\Http\Request;

interface UserModel
{
    public function getPermissions(): array;

    /**
     * return array of login inpts
     * ex [email,username]
     * @return array
     */
    public function getLoginKeys(): array;

    public function passwordMatched(Request $request);

    public function isActive();

    public function isTokenExpire(): bool;

    public function makeForgetPassword(): bool;

    public function reActiveUserAfterForgetPassword(): bool;

    public function getUserByToken($token);

    public function setNewPassword($password);
}