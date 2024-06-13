<?php

namespace App\Services;

use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Storage;

class UserServices
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['id'] = \Uuid::generate(4);
        $data['foto_profile'] = $request->foto_profile->store('foto_profile', 'public');
        $data['password'] = bcrypt($data['password']);
        User::create($data);


        return true;
    }

    public function handleUpdate($request, $user)
    {
        $data = $request->validated();
        if ($request->hasFile('foto_profile')) {
            Storage::delete('public/' . $user->foto_profile);
            $data['foto_profile'] = $request->foto_profile->store('foto_profile', 'public');
        }

        $user->update($data);

        return true;
    }

    public function handleDestroy($user)
    {
        Storage::delete('public/' . $user->foto_profile);
        $user->delete();

        return true;
    }
}
