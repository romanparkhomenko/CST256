<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $user = new UserModel($username, $password);

        $service = new SecurityService();
        $status = $service->login($user);

        if ($status){
            $data = ['model' => $user];
            return view('loginPassed2')->with($data);
        } else {
            return view('loginFailed');
        }
    }
}
