<?php

namespace App\Services;

use App\Models\PengadaanBarang;
use Illuminate\Support\Facades\Storage;
use Mail;
use PDF;
use Carbon\Carbon;

class PengadaanBarangServices
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['id'] = \Uuid::generate(4);
        $data['status'] = '-';
        PengadaanBarang::create($data);

        return true;
    }

    public function handleUpdate($request, $PengadaanBarang)
    {
        $data = $request->validated();
        $data['status'] = 'done';
        $PengadaanBarang->update($data);

        return true;
    }

    
    public function handleDestroy($PengadaanBarang)
    {
        $PengadaanBarang->delete();

        return true;
    }
}
