<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
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

Route::group(['middleware' => 'prevent-back-history'], function () {
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
    Route::group(['middleware' => 'auth'], function () {
        Route::get('password', [PasswordController::class, 'edit'])->name('user.password.edit');
        Route::patch('password', [PasswordController::class, 'update'])->name('user.password.update');

        Route::prefix('laporan')
            ->name('laporan.')
            ->controller(LaporanController::class)
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/autocomplete_prodi', 'autocomplete_prodi')->name('autocomplete_prodi');
                Route::get('/autocomplete_dosen', 'autocomplete_dosen')->name('autocomplete_dosen');
            });

        Route::prefix('profile')
            ->name('profile.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/{user}/edit', 'edit')->name('edit');
                Route::patch('/{user}', 'update')->name('update');
            });

        Route::prefix('repository')
            ->name('repository.')
            ->controller(LaporanController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{laporan}/edit', 'edit')->name('edit');
                Route::get('/autocomplete_prodi', 'autocomplete_prodi')->name('autocomplete_prodi');
                Route::get('/autocomplete_dosen', 'autocomplete_dosen')->name('autocomplete_dosen');
                Route::patch('/{laporan}', 'update')->name('update');
                Route::delete('/{laporan}', 'destroy')->name('destroy');
            });

        Route::group(
            [
                'middleware' => [
                    function ($request, $next) {
                        if (auth()->user()->role == 'admin') {
                            return $next($request);
                        }
                        auth()->logout();
                        return redirect()
                            ->route('login')
                            ->with('error', 'anda perlu login sebagai admin');
                    },
                ],
            ],
            function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

                Route::prefix('users')
                    ->name('users.')
                    ->controller(UserController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/{user}/edit', 'edit')->name('edit');
                        Route::patch('/{user}', 'update')->name('update');
                        Route::delete('/{user}', 'destroy')->name('destroy');
                    });

                Route::prefix('verifikasi_laporan')
                    ->name('verifikasilaporan.')
                    ->controller(LaporanController::class)
                    ->group(function () {
                        Route::get('/', 'verifikasi_index')->name('index');
                        Route::patch('/{laporan}', 'verifikasi_update')->name('update');
                        Route::delete('/{laporan}', 'verifikasi_cancel')->name('cancel');
                    });
            },
        );
    });
});
