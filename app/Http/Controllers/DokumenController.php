<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Services\DokumenServices;
use App\Http\Requests\DokumenRequest;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = Dokumen::query()
            ->with('users', 'klasifikasis')
            ->where('verifikasi', true)
            ->get();
        return view('dashboard.dokumen.index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'kode');
        return view('dashboard.dokumen.create', [
            'klasifikasis' => $klasifikasis,
        ]);
    }

    public function verifikasi_index()
    {
        $dokumen = Dokumen::query()
            ->with('users', 'klasifikasis')
            ->where('verifikasi', false)
            ->get();
        return view('dashboard.dokumen.verifikasi_index', compact('dokumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DokumenRequest $request, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleStore($request);

        return redirect()
            ->route('dokumen.create')
            ->withSuccess('dokumen berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'kode');
        return view('dashboard.dokumen.edit', [
            'dokumen' => $dokumen,
            'klasifikasis' => $klasifikasis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DokumenRequest $request, Dokumen $dokumen, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleUpdate($request, $dokumen);

        return redirect()
            ->route('repository.index')
            ->withSuccess('dokumen berhasil diubah');
    }

    public function verifikasi_update(DokumenRequest $request, Dokumen $dokumen, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleVerifikasi($request, $dokumen);
        return redirect()
            ->route('verifikasidokumen.index')
            ->withSuccess('dokumen berhasil diverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleDestroy($dokumen);

        return redirect()
            ->route('repository.index')
            ->withSuccess('dokumen berhasil dihapus');
    }
}
