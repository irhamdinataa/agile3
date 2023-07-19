<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use App\Services\SuratKeluarServices;
use App\Http\Requests\SuratKeluarRequest;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratkeluar = SuratKeluar::query()
            ->with('users', 'klasifikasis')
            ->get();
        return view('dashboard.suratkeluar.index', compact('suratkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'nama');
        return view('dashboard.suratkeluar.create', [
            'klasifikasis' => $klasifikasis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratKeluarRequest $request, SuratKeluarServices $suratkeluarServices)
    {
        $suratkeluarServices->handleStore($request);

        return redirect()
            ->route('suratkeluar.index')
            ->withSuccess('surat keluar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratkeluar)
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'nama');
        return view('dashboard.suratkeluar.edit', [
            'suratkeluar' => $suratkeluar,
            'klasifikasis' => $klasifikasis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratKeluarRequest $request, SuratKeluar $suratkeluar, SuratKeluarServices $suratkeluarServices)
    {
        $suratkeluarServices->handleUpdate($request, $suratkeluar);

        return redirect()
            ->route('suratkeluar.index')
            ->withSuccess('surat keluar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratkeluar, SuratKeluarServices $suratkeluarServices)
    {
        $suratkeluarServices->handleDestroy($suratkeluar);

        return redirect()
            ->route('suratkeluar.index')
            ->withSuccess('surat keluar berhasil dihapus');
    }
}
