<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\KelolaGuruController;
use App\Http\Controllers\Admin\KelolaKriteriaController;
use App\Http\Controllers\Admin\KelolaSubkriteriaController;
use App\Http\Controllers\Admin\KelolaBobotSubkriteriaController;
use App\Http\Controllers\Admin\KelolaUserController;
use App\Http\Controllers\KS\PenilaianController;
use App\Http\Controllers\KS\PerankinganController;

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
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::prefix('/dashboard')->group(function () {
        Route::middleware('role:admin')->group(function () {
            Route::controller(KelolaGuruController::class)->group(function () {
                Route::get('/kelola_guru', 'index')->name('kelola_guru.index');
                Route::post('/kelola_guru', 'store')->name('kelola_guru.store');
                Route::get('/kelola_guru/{id}/edit', 'edit')->name('kelola_guru.edit');
                Route::put('/kelola_guru/{id}', 'update')->name('kelola_guru.update');
                Route::delete('/kelola_guru/{id}', 'destroy')->name('kelola_guru.destroy');
            });
            Route::controller(KelolaKriteriaController::class)->group(function () {
                Route::get('/kelola_kriteria', 'index')->name('kelola_kriteria.index');
                Route::post('/kelola_kriteria', 'store')->name('kelola_kriteria.store');
                Route::get('/kelola_kriteria/{id}/edit', 'edit')->name('kelola_kriteria.edit');
                Route::put('/kelola_kriteria/{id}', 'update')->name('kelola_kriteria.update');
                Route::delete('/kelola_kriteria/{id}', 'destroy')->name('kelola_kriteria.destroy');
            });
            Route::controller(KelolaSubkriteriaController::class)->group(function () {
                Route::get('/kelola_subkriteria', 'index')->name('kelola_subkriteria.index');
                Route::post('/kelola_subkriteria', 'store')->name('kelola_subkriteria.store');
                Route::get('/kelola_subkriteria/{id}/edit', 'edit')->name('kelola_subkriteria.edit');
                Route::put('/kelola_subkriteria/{id}', 'update')->name('kelola_subkriteria.update');
                Route::delete('/kelola_subkriteria/{id}', 'destroy')->name('kelola_subkriteria.destroy');
            });
            Route::controller(KelolaBobotSubkriteriaController::class)->group(function () {
                Route::get('/kelola_bobot_subkriteria/{subkriteria}', 'index')->name('kelola_bobot_subkriteria.index');
                Route::post('/kelola_bobot_subkriteria/{subkriteria}', 'store')->name('kelola_bobot_subkriteria.store');
                Route::get('/kelola_bobot_subkriteria/{id}/edit', 'edit')->name('kelola_bobot_subkriteria.edit');
                Route::put('/kelola_bobot_subkriteria/{id}', 'update')->name('kelola_bobot_subkriteria.update');
                Route::delete('/kelola_bobot_subkriteria/{id}', 'destroy')->name('kelola_bobot_subkriteria.destroy');
            });
            Route::controller(KelolaUserController::class)->group(function () {
                Route::get('/kelola_user', 'index')->name('kelola_user.index');
                Route::get('/kelola_user/{id}/edit', 'edit')->name('kelola_user.edit');
                Route::put('/kelola_user/{id}', 'update')->name('kelola_user.update');
            });
        });
        Route::middleware('role:kepala_sekolah')->group(function () {
            Route::controller(PenilaianController::class)->group(function () {
                Route::get('/penilaian', 'index')->name('penilaian.index');
                Route::get('/penilaian/{id}', 'penilaian')->name('penilaian.penilaian');
                Route::post('/penilaian/{id}', 'store')->name('penilaian.store');
            });
            Route::controller(PerankinganController::class)->group(function () {
                Route::get('/nilai_rata_rata', 'nilaiRataRata')->name('perankingan.nilaiRataRata');
                Route::get('/nilai_utility', 'nilaiUtility')->name('perankingan.nilaiUtility');
                Route::get('/nilai_akhir', 'nilaiAkhir')->name('perankingan.nilaiAkhir');
            });
        });
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
        });
    });
});

require __DIR__ . '/auth.php';
