<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [
            'users' => $users,
        ];
        return view('admin')->with($data);
    }

    public function editUser($userId) {

        $users = User::all();
        $activeUser = User::find($userId);

        $data = [
            'users' => $users,
            'activeUser' => $activeUser,
        ];
        return view('admin')->with($data);
    }

    public function hardDelete(Request $request)
    {
        $id = $request->input('id');
        User::destroy($id);

        $users = User::all();
        $data = [
            'users' => $users,
        ];

        return view('admin')->with($data);
    }

    public function softDelete(Request $request)
    {
        $id = $request->input('id');
        User::find($id)
            ->update(['deleted_at' => now()]);

        $users = User::all();
        $data = [
            'users' => $users,
        ];
        return view('admin')->with($data);
    }
}
