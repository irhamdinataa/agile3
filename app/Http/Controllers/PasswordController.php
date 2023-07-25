<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.index');
    }
    public function update(\App\Http\Requests\UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()
            ->route('user.password.edit')
            ->with(['success' => 'Berhasil Diubah']);
    }
}
