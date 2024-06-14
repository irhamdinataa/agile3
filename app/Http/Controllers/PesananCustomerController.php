<?php

namespace App\Http\Controllers;

use App\Models\PesananCustomer;
use Illuminate\Http\Request;
use App\Services\PesananCustomerServices;
use App\Http\Requests\PesananCustomerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use PDF;

class PesananCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PesananCustomer = PesananCustomer::query()->get();
        return view('dashboard.PesananCustomer.index', compact('PesananCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.PesananCustomer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesananCustomerRequest $request, PesananCustomerServices $PesananCustomerServices)
    {
        $PesananCustomerServices->handleStore($request);

        return redirect()->route('PesananCustomer.index')->withSuccess('Pesanan Customer berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesananCustomer $PesananCustomer)
    {
        return view('dashboard.PesananCustomer.edit', [
            'PesananCustomer' => $PesananCustomer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PesananCustomerRequest $request, PesananCustomer $PesananCustomer, PesananCustomerServices $PesananCustomerServices)
    {
        $PesananCustomerServices->handleUpdate($request, $PesananCustomer);

        return redirect()->route('PesananCustomer.index')->withSuccess('Pesanan Customer berhasil diubah');
    }

    public function destroy(PesananCustomer $PesananCustomer, PesananCustomerServices $PesananCustomerServices)
    {
        $PesananCustomerServices->handleDestroy($PesananCustomer);

        return redirect()->route('PesananCustomer.index')->withSuccess('Pesanan Customer berhasil dihapus');
    }

    public function download()
    {

        $pesanancustomers = PesananCustomer::query()->get();
        if ($pesanancustomers->count() === 0) {
            return redirect()->back();
        }

        $pdf = PDF::loadView('reports.laporanpesanancustomer', compact('pesanancustomers'))->setPaper('a4', 'landscape');
        return $pdf->stream('pesanancustomer.pdf');
    }
}
