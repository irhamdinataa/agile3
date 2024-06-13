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
        $users = User::query()->where('role', 'produksi')->orWhere('role', 'pengadaan')->get();
        return view('dashboard.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, UserServices $user)
    {
        $user->handleStore($request);
        return redirect()->route('users.index');
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

    public function profile(User $user)
    {
        return view('dashboard.profile.edit', [
            'user' => $user,
        ]);
    }
    public function profile_update(UserRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdate($request, $user);
        return redirect()
            ->route('profile.edit', auth()->user()->id)
            ->withSuccess('profile berhasil diubah');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user, UserServices $userServices)
    {
        $userServices->handleUpdate($request, $user);
        return redirect()
            ->route('users.edit', $user->id)
            ->withSuccess('user berhasil diubah');
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
