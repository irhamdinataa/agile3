<?php

namespace App\Http\Controllers;

use App\Models\PengadaanBarang;
use Illuminate\Http\Request;
use App\Services\PengadaanBarangServices;
use App\Http\Requests\PengadaanBarangRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use PDF;


class PengadaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PengadaanBarang = PengadaanBarang::query()->get();
        return view('dashboard.PengadaanBarang.index', compact('PengadaanBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.PengadaanBarang.create');
    }

    public function verifikasi_index()
    {
        $PengadaanBarang = PengadaanBarang::query()
            ->with('users')
            ->where('verifikasi', false)
            ->get();
        return view('dashboard.PengadaanBarang.verifikasi_index', compact('PengadaanBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PengadaanBarangRequest $request, PengadaanBarangServices $PengadaanBarangServices)
    {
        $PengadaanBarangServices->handleStore($request);

        return redirect()
            ->route('PengadaanBarang.index')
            ->withSuccess('Pengadaan Barang Sudah Selesai berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengadaanBarang $PengadaanBarang)
    {
        return view('dashboard.PengadaanBarang.edit', [
            'PengadaanBarang' => $PengadaanBarang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PengadaanBarangRequest $request, PengadaanBarang $PengadaanBarang, PengadaanBarangServices $PengadaanBarangServices)
    {
        $PengadaanBarangServices->handleUpdate($request, $PengadaanBarang);

        return redirect()
            ->route('PengadaanBarang.index')
            ->withSuccess('Pengadaan Barang Sudah Selesai');
    }

    
    public function destroy(PengadaanBarang $PengadaanBarang, PengadaanBarangServices $PengadaanBarangServices)
    {
        $PengadaanBarangServices->handleDestroy($PengadaanBarang);

        return redirect()
            ->route('PengadaanBarang.index')
            ->withSuccess('Pengadaan Barang Sudah Selesai berhasil dihapus');
    }

    public function download()
    {

        $pengadaanbarangs = PengadaanBarang::query()->get();
        if ($pengadaanbarangs->count() === 0) {
            return redirect()->back();
        }

        $pdf = PDF::loadView('reports.laporanpengadaanbarang', compact('pengadaanbarangs'))->setPaper('a4', 'landscape');
        return $pdf->stream('pengadaanbarang.pdf');
    }

}
