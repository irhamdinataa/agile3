<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome'); 
});

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

    Route::prefix('kode-klasifikasi')
        ->name('classifications.')
        ->controller(KlasifikasiController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{slug}/edit', 'edit')->name('edit');
            Route::patch('/{klasifikasi}', 'update')->name('update');
            Route::delete('/{slug}', 'destroy')->name('destroy');
        });

});
