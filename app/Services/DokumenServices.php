<?php

namespace App\Services;

use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage;

class DokumenServices
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['lampiran'] = $request->lampiran->store('lampiran_dokumen', 'public');
        if (auth()->user()->role == 'admin') {
            $data['verifikasi'] = true;
        } else {
            $data['verifikasi'] = true;
        }

        Dokumen::create($data);

        return true;
    }

    public function handleUpdate($request, $dokumen)
    {
        $data = $request->validated();

        if ($request->hasFile('lampiran')) {
            Storage::delete('public/' . $dokumen->lampiran);
            $data['lampiran'] = $request->lampiran->store('lampiran_dokumen', 'public');
        }

        $dokumen->update($data);

        return true;
    }

    public function handleVerifikasi($request, $dokumen)
    {
        $data = $request->validated();
        $data['verifikasi'] = true;

        $dokumen->update($data);

        return true;
    }

    public function handleDestroy($dokumen)
    {
        Storage::delete('public/' . $dokumen->lampiran);
        $dokumen->delete();

        return true;
    }
}
