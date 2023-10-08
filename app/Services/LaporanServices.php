<?php

namespace App\Services;

use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;
use Mail;

class LaporanServices
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['jurnal'] = $request->jurnal->store('jurnal', 'public');
        $data['laporan'] = $request->laporan->store('laporan', 'public');
        if (auth()->user()->role == 'admin') {
            $data['verifikasi'] = true;
        } else {
            $data['verifikasi'] = false;
        }

        Laporan::create($data);

        return true;
    }

    public function handleUpdate($request, $laporan)
    {
        $data = $request->validated();

        if ($request->hasFile('jurnal')) {
            Storage::delete('public/' . $laporan->jurnal);
            $data['jurnal'] = $request->jurnal->store('jurnal', 'public');
        }
        if ($request->hasFile('laporan')) {
            Storage::delete('public/' . $laporan->laporan);
            $data['laporan'] = $request->laporan->store('laporan', 'public');
        }

        $laporan->update($data);

        return true;
    }

    public function handleVerifikasi($request, $laporan)
    {
        $data = $request->validated();
        $data['verifikasi'] = true;

        $laporan->update($data);

        $email['title'] = 'Laporan Telah Di Verifikasi';
        $email['bodyatas'] = 'Selamat, Laporan dengan: ';
        $email['nama'] = 'Nama : ' . $laporan->nama;
        $email['npm'] = 'NPM : ' . $laporan->npm;
        $email['judul'] = 'Judul : ' . $laporan->judul;
        $email['bodybawah'] = 'Berhasil diverifikasi';
        $email['email'] = $laporan->email;
        Mail::send('emails.verifikasi', $email, function ($message) use ($email) {
            $message->to($email['email'], $email['email'])->subject($email['title']);
        });

        return true;
    }

    public function handleCancel($laporan)
    {
        Storage::delete('public/' . $laporan->jurnal);
        Storage::delete('public/' . $laporan->laporan);
        $laporan->delete();

        $email['title'] = 'Laporan Telah Di Tolak';
        $email['bodyatas'] = 'Maaf, Laporan dengan: ';
        $email['nama'] = 'Nama : ' . $laporan->nama;
        $email['npm'] = 'NPM : ' . $laporan->npm;
        $email['judul'] = 'Judul : ' . $laporan->judul;
        $email['bodybawah'] = 'Gagal diverifikasi';
        $email['email'] = $laporan->email;
        Mail::send('emails.verifikasi', $email, function ($message) use ($email) {
            $message->to($email['email'], $email['email'])->subject($email['title']);
        });

        return true;
    }

    public function handleDestroy($laporan)
    {
        Storage::delete('public/' . $laporan->jurnal);
        Storage::delete('public/' . $laporan->laporan);
        $laporan->delete();

        return true;
    }
}
