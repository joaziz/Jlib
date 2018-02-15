<?php

namespace Jlib\Auth\Contracts;

use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 05:56 م
 */
interface AuthControllerInterface
{
    public function dashboard();

    public function getLogin();

    public function postLogin(Request $request);

    public function getSingUp();

    public function postSingUp(Request $request);

    public function getForgetPassword();

    public function postForgetPassword(Request $request);

    public function getResetPassword($token);

    public function getLogout();
}
