<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Services\SuratMasukServices;
use App\Http\Requests\SuratMasukRequest;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::query()
            ->with('users','klasifikasis')
            ->get();
        return view('dashboard.suratmasuk.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'nama');
        return view('dashboard.suratmasuk.create', [
            'klasifikasis' => $klasifikasis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratMasukRequest $request, SuratMasukServices $suratmasukServices)
    {
        $suratmasukServices->handleStore($request);

        return redirect()
            ->route('suratmasuk.index')
            ->withSuccess('surat masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratmasuk)
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'nama');
        return view('dashboard.suratmasuk.edit', [
            'suratmasuk' => $suratmasuk,
            'klasifikasis' => $klasifikasis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratMasukRequest $request, SuratMasuk $suratmasuk, SuratMasukServices $suratmasukServices)
    {
        $suratmasukServices->handleUpdate($request, $suratmasuk);

        return redirect()
            ->route('suratmasuk.index')
            ->withSuccess('surat masuk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratmasuk, SuratMasukServices $suratmasukServices)
    {
        $suratmasukServices->handleDestroy($suratmasuk);

        return redirect()
            ->route('suratmasuk.index')
            ->withSuccess('surat masuk berhasil dihapus');
    }
}
