<?php

namespace App\Services;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;

class SuratMasukServices {
    public function handleStore($request) {

        $data = $request->validated();
        $data['lampiran'] = $request->lampiran->store('lampiran_surat_masuk', 'public');
        $data['verifikasi'] = false;

        SuratMasuk::create($data);

        return true;
    }

    public function handleUpdate($request, $suratmasuk) {
        $data = $request->validated();

        if($request->hasFile('lampiran')){
            Storage::delete('public/'.$suratmasuk->lampiran);
            $data['lampiran'] = $request->lampiran->store('lampiran_surat_masuk', 'public');
        }

        $suratmasuk->update($data);

        return true;
    }

    public function handleVerifikasi($request, $suratmasuk) {
        $data = $request->validated();
        $data['verifikasi'] = true;

        $suratmasuk->update($data);

        return true;
    }

    public function handleDestroy($suratmasuk) {

        Storage::delete('public/'.$suratmasuk->lampiran);
        $suratmasuk->delete();

        return true;
    }
}
