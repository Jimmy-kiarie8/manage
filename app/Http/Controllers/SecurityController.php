<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;

use App\User;
use App\Manage;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function login(Request $request)
    {
        // return $request->all();
        if (Auth::Attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/home')->with('success', 'Login successifull');
        }else{
            return redirect()->back();
        }
    }

    public function signin(Request $request, User $user)
    {
        if (Auth::Attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/home')->with('success', 'Login successifull');
        }else{
            return redirect()->back();
        }
    }

    public function store(UserRequest $request)
    {
        // return $request->all();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }

    public function usersinf()
    {
        return User::Limit(3)->get();
    }

    public function orginf()
    {
        return Manage::Limit(3)->get();
    }
    
}
