<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\KelolaGuruController;
use App\Http\Controllers\Admin\KelolaKriteriaController;

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
        });
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
        });
    });
});

require __DIR__ . '/auth.php';
