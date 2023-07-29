<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'email diperlukan',
                'password.required' => 'password diperlukan',
            ],
        );

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->setRememberToken(Str::random(60));
            $user->save();
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/repository');
            }
        }
        return redirect()
            ->back()
            ->with(['error' => 'incorrect email or password'])
            ->withInput($request->all);
    }
    public function login()
    {
        if (Auth::check()) {
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/repository');
            }
        }
        return view('login.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('/');
    }
    public function register()
    {
        return view('register.index');
    }
    public function forgotpassword()
    {
        return view('password.forgot');
    }
    public function forgotpassword_post(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required',
            ],
            [
                'email.required' => 'email diperlukan',
            ],
        );
        if (
            \DB::table('users')
                ->where('email', $request->email)
                ->exists()
        ) {
            $password = Str::random(3) . 'earsipapp' . str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);
            \DB::table('users')
                ->where('email', $request->email)
                ->update([
                    'password' => bcrypt($password),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            $data['email'] = $request->email;
            $data['title'] = 'Your New E-Arsip Account Password';
            $data['body'] = sprintf('New password : %s', $password);
            Mail::send('emails.forgotpassword', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['email'])->subject($data['title']);
            });

            return redirect()
                ->intended('/forgotpassword')
                ->with(['success' => 'successfully sent to your email'])
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, proxy-revalidate',
                    'Pragma' => 'no-cache',
                    'Expires' => '0',
                ]);
        } else {
            return redirect()
                ->back()
                ->with(['error' => 'no account registered with that email'])
                ->withInput($request->all);
        }
    }
}
