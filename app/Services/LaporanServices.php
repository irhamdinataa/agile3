<?php

namespace App\Services;

use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;
use Mail;
use PDF;
use Carbon\Carbon;

class LaporanServices
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['jurnal'] = $request->jurnal->store('jurnal', 'public');
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

        $laporan->update($data);

        return true;
    }

    public function handleVerifikasi($request, $laporan)
    {
        $data = $request->validated();
        $data['verifikasi'] = true;

        $laporan->update($data);

        $id = $laporan->id;
        $month = Carbon::now()->format('m');
        $date = Carbon::now()->isoFormat('D MMMM Y');
        $nama = $laporan->nama;
        $npm = $laporan->npm;
        $program = $laporan->prodi;
        $dosen = $laporan->dosen;
        $jenis = $laporan->jenis;
        $judul = $laporan->judul;

        $pdf = PDF::loadView('reports.laporan',compact('id','month','date','nama','npm','program','dosen','jenis','judul'))->setPaper('a4', 'potrait');

        $email['title'] = 'Laporan Telah Di Verifikasi';
        $email['bodyatas'] = 'Selamat, Laporan dengan: ';
        $email['nama'] = 'Nama : ' . $laporan->nama;
        $email['npm'] = 'NPM : ' . $laporan->npm;
        $email['judul'] = 'Judul : ' . $laporan->judul;
        $email['bodybawah'] = 'Berhasil diverifikasi';
        $email['email'] = $laporan->email;
        Mail::send('emails.verifikasi', $email, function ($message) use ($email, $pdf) {
            $message->to($email['email'], $email['email'])->subject($email['title'])->attachData($pdf->output(), 'laporan.pdf', [
                'mime' => 'application/pdf',
            ]);
        });

        return true;
    }

    public function handleCancel($laporan)
    {
        Storage::delete('public/' . $laporan->jurnal);
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
        $laporan->delete();

        return true;
    }
}
