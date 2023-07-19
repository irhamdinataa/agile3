<?php

namespace App\Services;

use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;

class SuratKeluarServices {
    public function handleStore($request) {

        $data = $request->validated();
        $data['lampiran'] = $request->lampiran->store('lampiran_surat_keluar', 'public');

        SuratKeluar::create($data);

        return true;
    }

    public function handleUpdate($request, $suratkeluar) {
        $data = $request->validated();

        if($request->hasFile('lampiran')){
            Storage::delete('public/'.$suratkeluar->lampiran);
            $data['lampiran'] = $request->lampiran->store('lampiran_surat_keluar', 'public');
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
