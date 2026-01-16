<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\KomponenController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Tim\PenilaianController;
use App\Http\Controllers\Kepala\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/tim/dashboard', function () {
        return view('tim.dashboard');
    });

    Route::get('/kepala/dashboard', function () {
        return view('kepala.dashboard');
    });
});

Route::prefix('admin')->middleware('auth')->group(function () {

    // Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/komponen', [KomponenController::class,'index'])->name('admin.komponen');
    Route::post('/komponen', [KomponenController::class,'store'])->name('admin.komponen.store');
    Route::get('/komponen/delete/{id}', [KomponenController::class,'destroy'])->name('admin.komponen.delete');
    Route::get('/komponen/edit/{id}', [KomponenController::class,'edit']);
    Route::post('/komponen/update/{id}', [KomponenController::class,'update']);

    Route::get('/komponen/{id}/indikator', [IndikatorController::class,'index']);
    Route::post('/komponen/{id}/indikator', [IndikatorController::class,'store']);
    Route::get('/indikator/delete/{id}', [IndikatorController::class,'destroy']);
    Route::post('/indikator/update/{id}',[IndikatorController::class,'update']);

});

Route::prefix('tim')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PenilaianController::class,'komponen'])->name('tim.dashboard');

    Route::get('/penilaian/{komponen}', [PenilaianController::class,'indikator']);
    Route::post('/penilaian/simpan', [PenilaianController::class,'simpan'])->name('tim.penilaian.simpan');

    Route::get('/komponen', [PenilaianController::class,'komponen']);
    Route::get('/indikator/{komponen}/{no}', [PenilaianController::class,'step']);
    Route::post('/indikator/jawab', [PenilaianController::class,'jawabStep']);
    Route::get('/rekap', [PenilaianController::class, 'rekap']);
    Route::get('/laporan', [PenilaianController::class,'laporan']);

});

Route::prefix('kepala')->middleware('auth')->group(function(){
    // Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/rekap', [DashboardController::class, 'rekap']);
    Route::get('/laporan', [DashboardController::class,'laporan']);
});







