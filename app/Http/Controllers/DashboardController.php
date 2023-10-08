<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use App\Models\Laporan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $laporandiverifikasi = Laporan::query()
        ->where('verifikasi', true)

            ->count();

            $laporanbelum = Laporan::query()
            ->where('verifikasi', false)

            ->count();

        $user = User::query()
            ->where('role', 'user')
            ->count();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'laporandiverifikasi' => $laporandiverifikasi,
            'laporanbelum' => $laporanbelum,
            'user' => $user,
        ]);
    }
}
