<?php

namespace App\Services;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;

class SuratMasukServices {
    public function handleStore($request) {

        $data = $request->validated();
        $data['lampiran'] = $request->lampiran->store('lampiran_surat_masuk', 'public');

        SuratMasuk::create($data);

        return true;
    }

    public function handleUpdate($request, $suratkeluar) {
        $data = $request->validated();

        if($request->hasFile('lampiran')){
            Storage::delete('public/'.$suratkeluar->lampiran);
            $data['lampiran'] = $request->lampiran->store('lampiran_surat_masuk', 'public');
        }

        $suratkeluar->update($data);

        return true;
    }

    public function handleDestroy($suratkeluar) {

        Storage::delete('public/'.$suratkeluar->lampiran);
        $suratkeluar->delete();

        return true;
    }
}
