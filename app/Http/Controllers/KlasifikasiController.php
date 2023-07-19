<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Services\KlasifikasiServices;
use App\Http\Requests\KlasifikasiRequest;


class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasi = Klasifikasi::all();
        return view('dashboard.klasifikasi.index', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KlasifikasiRequest $request, KlasifikasiServices $klasifikasiServices)
    {
        $klasifikasiServices->handleStore($request);

        return redirect()
            ->route('klasifikasi.index')
            ->withSuccess('klasifikasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Klasifikasi $klasifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klasifikasi $klasifikasi)
    {
        return view('dashboard.klasifikasi.edit', [
            'klasifikasi' => $klasifikasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KlasifikasiRequest $request, Klasifikasi $klasifikasi, KlasifikasiServices $klasifikasiServices)
    {
        $klasifikasiServices->handleUpdate($request, $klasifikasi);

        return redirect()
            ->route('klasifikasi.index')
            ->withSuccess('klasifikasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klasifikasi $klasifikasi, KlasifikasiServices $klasifikasiServices)
    {
        $klasifikasiServices->handleDestroy($klasifikasi);

        return redirect()
            ->route('klasifikasi.index')
            ->withSuccess('klasifikasi berhasil dihapus');
    }
}
