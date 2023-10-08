<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Services\DokumenServices;
use App\Http\Requests\DokumenRequest;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

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
        return view('dashboard.laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'kode');
        return view('dashboard.laporan.create', [
            'klasifikasis' => $klasifikasis,
        ]);
    }

    public function verifikasi_index()
    {
        $dokumen = Dokumen::query()
            ->with('users', 'klasifikasis')
            ->where('verifikasi', false)
            ->get();
        return view('dashboard.laporan.verifikasi_index', compact('laporan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DokumenRequest $request, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleStore($request);

        return redirect()
            ->route('laporan.create')
            ->withSuccess('laporan berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        $klasifikasis = Klasifikasi::query()->pluck('id', 'kode');
        return view('dashboard.laporan.edit', [
            'laporan' => $laporan,
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
            ->withSuccess('laporan berhasil diubah');
    }

    public function verifikasi_update(DokumenRequest $request, Dokumen $dokumen, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleVerifikasi($request, $dokumen);
        return redirect()
            ->route('verifikasidokumen.index')
            ->withSuccess('laporan berhasil diverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen, DokumenServices $dokumenServices)
    {
        $dokumenServices->handleDestroy($dokumen);

        return redirect()
            ->route('repository.index')
            ->withSuccess('laporan berhasil dihapus');
    }

    public function autocomplete_prodi(Request $request)
    {
        $data = DB::table('prodis')
            ->select('nama')
            ->where('nama', 'LIKE', "%{$request->term}%")
            ->get();

        return response()->json($data);
    }

    public function autocomplete_dosen(Request $request)
    {
        $data = DB::table('dosens')
            ->select('nama')
            ->where('nama', 'LIKE', "%{$request->term}%")
            ->get();

        return response()->json($data);
    }
}
