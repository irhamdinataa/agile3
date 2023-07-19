<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlasifikasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('suratkeluar')
        ->name('suratkeluar.')
        ->controller(SuratKeluarController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{suratkeluar}/edit', 'edit')->name('edit');
            Route::patch('/{suratkeluar}', 'update')->name('update');
            Route::delete('/{suratkeluar}', 'destroy')->name('destroy');
        });

    Route::prefix('suratmasuk')
        ->name('suratmasuk.')
        ->controller(SuratMasukController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{suratmasuk}/edit', 'edit')->name('edit');
            Route::patch('/{suratmasuk}', 'update')->name('update');
            Route::delete('/{suratmasuk}', 'destroy')->name('destroy');
        });

    Route::prefix('klasifikasi')
        ->name('klasifikasi.')
        ->controller(KlasifikasiController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{klasifikasi}/edit', 'edit')->name('edit');
            Route::patch('/{klasifikasi}', 'update')->name('update');
            Route::delete('/{klasifikasi}', 'destroy')->name('destroy');
        });

    Route::prefix('disposisi')
        ->name('disposisi.')
        ->controller(DisposisiController::class)
        ->group(function () {
            Route::get('disposisi/{suratmasuk}', 'index')->name('index');
            Route::get('disposisi/{suratmasuk}/create', 'create')->name('create');
            Route::post('disposisi/{suratmasuk}', 'store')->name('store');
            Route::get('disposisi/{suratmasuk}/{id}', 'edit')->name('edit');
            Route::patch('disposisi/{suratmasuk}/{id}', 'update')->name('update');
            Route::delete('disposisi/{suratmasuk}/{id}', 'destroy')->name('destroy');
            Route::get('disposisi/{suratmasuk}/{id}/download', 'download')->name('download');
        });
});
