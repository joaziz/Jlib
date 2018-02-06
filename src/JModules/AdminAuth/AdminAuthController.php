<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 07:15 م
 */

namespace Jlib\JModules\AdminAuth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jlib\Auth\Contracts\AuthControllerInterface;

class AdminAuthController extends Controller implements AuthControllerInterface
{


    public function getSingUp()
    {
        return response()->view("Jlib::errors.404")->setStatusCode(404);
    }

    public function postSingUp(Request $request)
    {
        return response()->view("Jlib::errors.404")->setStatusCode(404);
    }

    public function getLogin()
    {




        return view("JAuth::login");
    }

    public function postLogin(Request $request)
    {
        // TODO: Implement postLogin() method.
    }

    public function getForgetPassword()
    {
        // TODO: Implement getForgetPassword() method.
    }

    public function postForgetPassword(Request $request)
    {
        // TODO: Implement postForgetPassword() method.
    }

    public function getResetPassword($token)
    {
        // TODO: Implement getResetPassword() method.
    }

    public function getLogout()
    {
        // TODO: Implement getLogout() method.
    }
}