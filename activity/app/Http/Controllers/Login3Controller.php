<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\OrderBusinessService;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Login3Controller extends Controller {
    public function index(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $this->validateForm($request);

        $user = new UserModel($username, $password);

        $service = new SecurityService();
        $status = $service->login($user);

//        if ($status){
//            $data = ['model' => $user];
//            return view('loginPassed2')->with($data);
//        } else {
//            return view('loginFailed');
//        }
    }

    private function validateForm(Request $request){
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];

        $this->validate($request, $rules);
    }

    public function addOrder(Request $request){
        $service = new OrderBusinessService();
        $service->createOrder();
    }
}
