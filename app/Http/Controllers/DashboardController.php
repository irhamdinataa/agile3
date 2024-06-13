<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananCustomer;
use App\Models\PengadaanBarang;

class DashboardController extends Controller
{
    public function index()
    {
        $pesanancustomerselesai = PesananCustomer::query()
        ->whereColumn('kebutuhan', 'done')->count();
        $pesanancustomerbelumselesai = PesananCustomer::query()
        ->whereColumn('kebutuhan','!=', 'done')->count();
        $pengadaanbarangbelumselesai = PengadaanBarang::query()
        ->where('status','!=', 'done')->count();
        $pengadaanbarangselesai = PengadaanBarang::query()
        ->where('status', 'done')->count();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'pesanancustomerselesai' => $pesanancustomerselesai,
            'pesanancustomerbelumselesai' => $pesanancustomerbelumselesai,
            'pengadaanbarangbelumselesai' => $pengadaanbarangbelumselesai,
            'pengadaanbarangselesai' => $pengadaanbarangselesai
        ]);
    }
}
