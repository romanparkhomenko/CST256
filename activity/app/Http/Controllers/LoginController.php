<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use App\Services\Utility\MyLogger1;
use App\Services\Utility\MyLogger2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller {

    public function index(Request $request){
        MyLogger2::info("Entering LoginController::index()");
        $username = $request->input('username');
        $password = $request->input('password');

        MyLogger2::info("Parameters are UN:". $username . " PW: " . $password);

        $user = new UserModel($username, $password);

        $service = new SecurityService();
        $status = $service->login($user);

        if ($status){
            $data = ['model' => $user];
            MyLogger2::info("Exit LoginController::index() with login passing");
            return view('loginPassed')->with($data);
        } else {
            MyLogger2::info("Exit LoginController::index() with login failing");
            return view('loginFailed');
        }
    }
}
