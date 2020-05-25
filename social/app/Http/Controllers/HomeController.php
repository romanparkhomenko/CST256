<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateProfile(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $id = $request->input('id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $about = $request->input('about');
        $jobtitle = $request->input('jobtitle');
        $isAdmin = $request->input('isAdmin');

        $user = new UserModel($username, $password);
        $user->setId($id);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setPhone($phone);
        $user->setAbout($about);
        $user->setJobtitle($jobtitle);
        $user->setIsAdmin($isAdmin);

        $service = new SecurityService();
        $status = $service->updateUser($user);

        if ($status){
            $data = [
                'model' => $user,
                'message' => $status
            ];
            return view('home')->with($data);
        } else {
            return view('updateFailed');
        }
    }
}
