<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use App\Models\SuratMasuk;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $dokumen = SuratMasuk::query()
            ->where('verifikasi', true)
            ->count();

        $klasifikasi = Klasifikasi::query()->count();
        $user = User::query()
            ->where('role', 'user')
            ->where('verifikasi', true)
            ->count();
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'dokumen' => $dokumen,
            'klasifikasi' => $klasifikasi,
            'user' => $user,
        ]);
    }
}
