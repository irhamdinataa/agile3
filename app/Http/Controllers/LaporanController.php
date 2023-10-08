<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Services\LaporanServices;
use App\Http\Requests\LaporanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::query()
            ->with('users')
            ->where('verifikasi', true)
            ->get();
        return view('dashboard.laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.laporan.create');
    }

    public function verifikasi_index()
    {
        $laporan = Laporan::query()
            ->with('users')
            ->where('verifikasi',false)
            ->get();
        return view('dashboard.laporan.verifikasi_index', compact('laporan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaporanRequest $request, LaporanServices $laporanServices)
    {
        $laporanServices->handleStore($request);

        return redirect()
            ->route('laporan.create')
            ->withSuccess('laporan berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        return view('dashboard.laporan.edit', [
            'laporan' => $laporan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaporanRequest $request, Laporan $laporan, LaporanServices $laporanServices)
    {
        $laporanServices->handleUpdate($request, $laporan);

        return redirect()
            ->route('repository.index')
            ->withSuccess('laporan berhasil diubah');
    }

    public function verifikasi_update(LaporanRequest $request, Laporan $laporan, LaporanServices $laporanServices)
    {
        $laporanServices->handleVerifikasi($request, $laporan);
        return redirect()
            ->route('verifikasilaporan.index')
            ->withSuccess('laporan berhasil diverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function verifikasi_cancel(Laporan $laporan, LaporanServices $laporanServices)
    {
        $laporanServices->handleCancel($laporan);

        return redirect()
            ->route('repository.index')
            ->withSuccess('laporan berhasil ditolak');
    }
    public function destroy(Laporan $laporan, LaporanServices $laporanServices)
    {
        $laporanServices->handleDestroy($laporan);

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
