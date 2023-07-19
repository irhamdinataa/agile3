<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->setRememberToken(Str::random(60));
            $user->save();
            return redirect()->intended('/dashboard');
        }
        return redirect()
            ->back()
            ->with(['error' => 'incorrect email or password'])
            ->withInput($request->all);
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        }
        return view('login.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('/');
    }
}
