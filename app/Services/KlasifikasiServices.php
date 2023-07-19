<?php

namespace App\Services;

use App\Models\Klasifikasi;
use Illuminate\Support\Facades\Storage;

class KlasifikasiServices {
    public function handleStore($request) {
        $data = $request->validated();
        Klasifikasi::create($data);

        return true;
    }

    public function handleUpdate($request, $klasifikasi) {
        $data = $request->validated();
        $klasifikasi->update($data);

        return true;
    }

    public function handleDestroy($klasifikasi) {
        $klasifikasi->delete();

        return true;
    }
}
