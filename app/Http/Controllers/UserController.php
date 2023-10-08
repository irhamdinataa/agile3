<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserServices;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()
            ->where('role', 'user')
            ->get();
        return view('dashboard.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, UserServices $user)
    {
        try {
            $user->handleStore($request);
            return redirect()
                ->route('register')
                ->withSuccess('berhasil membuat akun');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with(['error' => 'email already used'])
                ->withInput($request->all);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user, UserServices $userServices)
    {
        // dd(hasRoutePrefix('users'));
        $userServices->handleUpdate($request, $user);
        if (Str::startsWith(url()->current(), route('users.edit', auth()->user()->id))) {
            return redirect()
                ->route('users.edit', auth()->user()->id)
                ->withSuccess('user berhasil diubah');
        } else {
            return redirect()
                ->route('profile.edit', auth()->user()->id)
                ->withSuccess('profile berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, UserServices $userServices)
    {
        $userServices->handleDestroy($user);
        return redirect()->route('users.index');
    }

}
