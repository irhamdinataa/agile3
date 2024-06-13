<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananCustomerController;
use App\Http\Controllers\PengadaanBarangController;
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
    Route::get('/forgotpassword', [LoginController::class, 'forgotpassword']);
    Route::post('/forgotpassword', [LoginController::class, 'forgotpassword_post']);
    Route::group(['middleware' => 'auth'], function () {
        Route::get('password', [PasswordController::class, 'edit'])->name('user.password.edit');
        Route::patch('password', [PasswordController::class, 'update'])->name('user.password.update');

        Route::prefix('profile')
            ->name('profile.')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/{user}/edit', 'profile')->name('edit');
                Route::patch('/{user}', 'profile_update')->name('update');
            });

        Route::prefix('PesananCustomer')
            ->name('PesananCustomer.')
            ->controller(PesananCustomerController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{PesananCustomer}/edit', 'edit')->name('edit');
                Route::patch('/{PesananCustomer}', 'update')->name('update');
                Route::delete('/{PesananCustomer}', 'destroy')->name('destroy');
                Route::get('/download', 'download')->name('download');
            });

        Route::prefix('PengadaanBarang')
            ->name('PengadaanBarang.')
            ->controller(PengadaanBarangController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::patch('/{PengadaanBarang}', 'update')->name('verifikasi');
                Route::delete('/{PengadaanBarang}', 'destroy')->name('destroy');
                Route::get('/download', 'download')->name('download');
                Route::get('/download', 'download')->name('download');
            });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(
            [
                'middleware' => [
                    function ($request, $next) {
                        if (auth()->user()->role == 'admin') {
                            return $next($request);
                        }
                        auth()->logout();
                        return redirect()->route('login')->with('error', 'anda perlu login sebagai admin');
                    },
                ],
            ],
            function () {
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
            },
        );
    });
});
