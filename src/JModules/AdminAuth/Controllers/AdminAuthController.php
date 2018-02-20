<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 05/02/18
 * Time: 07:15 م
 */

namespace Jlib\JModules\AdminAuth\Controllers\Admin;


use Illuminate\Http\Request;
use Jlib\Auth\AuthLogic;
use Jlib\Auth\Contracts\AuthControllerInterface;
use Jlib\Controller\BaseController;
use Jlib\JModules\AdminAuth\Models\Admin;
use Jlib\JModules\Log\Models\Log;


class AdminAuthController extends BaseController implements AuthControllerInterface
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
        return view("adminauth::admin.login");
    }

    public function postLogin(Request $request)
    {

        $this->validate($request, [
            "loginInput" => "required",
            "password" => "required"
        ]);

        $res = AuthLogic::login(new Admin());

        if (!$res->getStatus()) {

            flash()->error($res->getMessage());
            return redirect()->back();
        } else {
            flash()->success($res->getMessage());
            return redirect()->to(JConfig()["adminAuth"]["scopeDomain"]);
        }

    }

    public function getForgetPassword()
    {
        return view("adminauth::admin.forgetPassword");
    }

    public function postForgetPassword(Request $request)
    {
        $this->validate($request, [
            "email" => "required|image",
            "password" => "required"
        ]);
    }

    public function getResetPassword($token)
    {
        // TODO: Implement getResetPassword() method.
    }

    public function getLogout()
    {
        $res = AuthLogic::logout();
        flash()->success($res->getMessage());
        return redirect()->to(JConfig()["adminAuth"]["scopeDomain"] . "/auth/login");
    }

    public function dashboard()
    {


        $data =[];

        $data["logs"]=Log::quickAccess();
        return $this->view($data, "adminauth::admin.dashboard");
    }
}