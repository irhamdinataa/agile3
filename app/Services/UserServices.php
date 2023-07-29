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
        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'user';
        $data['verifikasi'] = false;
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
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);

        return true;
    }

    public function handleVerifikasi($request, $user)
    {
        $data = $request->validated();
        $data['verifikasi'] = true;

        $user->update($data);

        $email['title'] = 'Akun Telah Di Verifikasi';
        $email['body'] = 'Selamat, Sekarang anda sudah bisa login dengan email dan password yang anda buat sebelumnya';

        $email['email'] = $user->email;
        Mail::send('emails.verifikasi', $email, function ($message) use ($email) {
            $message->to($email['email'], $email['email'])->subject($email['title']);
        });
        return true;
    }

    public function handleDestroy($user)
    {
        Storage::delete('public/' . $user->foto_profile);
        $user->delete();

        return true;
    }
}
