<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\CheckUserInfo;
use App\Http\Requests\updateUser;

class UserInfoController extends Controller
{
    // public function index()
    // {
    //     //
    // }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    public function show()
    {
        $user = Auth::user();
        $gender = CheckUserInfo::checkGender($user);

        // dd($user);
        return view('userinfo.show', compact('user', 'gender'));
    }

    public function edit()
    {
        $user = Auth::user();
        $gender = CheckUserInfo::checkGender($user);

        return view('userinfo.edit', compact('user', 'gender'));
    }

    public function update(updateUser $request)
    {
        $user = Auth::user();

        $email = $request->input('email');
        if(isset($email)) {
            $user->email = $request->input('email');
        }

        $password = $request->input('password');
        if(isset($password)) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->save();

        return redirect('/')->with('status', '登録情報を変更しました');
    }

    // public function destroy($id)
    // {
    //     //
    // }
}
