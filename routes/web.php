<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;

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
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/forgotpassword', [LoginController::class, 'forgotpassword']);
Route::post('/forgotpassword', [LoginController::class, 'forgotpassword_post']);

Route::group(
    [
        'middleware' => [
            function ($request, $next) {
                if (auth()->user()->verifikasi == true) {
                    return $next($request);
                }
                auth()->logout();
                return redirect()
                    ->route('login')
                    ->with('error', 'Akun belum diverifikasi admin, akan diberitahukan di email anda');
            },
        ],
    ],
    function () {
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

        Route::prefix('dokumen')
            ->name('dokumen.')
            ->controller(SuratMasukController::class)
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
            });

        Route::prefix('repository')
            ->name('repository.')
            ->controller(SuratMasukController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
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

        Route::prefix('users')
            ->name('users.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{user}/edit', 'edit')->name('edit');
                Route::patch('/{user}', 'update')->name('update');
                Route::delete('/{user}', 'destroy')->name('destroy');
            });

        Route::prefix('users')
            ->name('users.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{user}/edit', 'edit')->name('edit');
                Route::patch('/{user}', 'update')->name('update');
                Route::delete('/{user}', 'destroy')->name('destroy');
            });

        Route::prefix('verifikasi_user')
            ->name('verifikasiuser.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/', 'verifikasi_index')->name('index');
                Route::patch('/{user}', 'verifikasi_update')->name('update');
                Route::delete('/{user}', 'destroy')->name('destroy');
            });

        Route::prefix('verifikasi_dokumen')
            ->name('verifikasidokumen.')
            ->controller(SuratMasukController::class)
            ->group(function () {
                Route::get('/', 'verifikasi_index')->name('index');
                Route::patch('/{suratmasuk}', 'verifikasi_update')->name('update');
                Route::delete('/{suratmasuk}', 'destroy')->name('destroy');
            });

        Route::get('password', [PasswordController::class, 'edit'])->name('user.password.edit');
        Route::patch('password', [PasswordController::class, 'update'])->name('user.password.update');
    },
);
