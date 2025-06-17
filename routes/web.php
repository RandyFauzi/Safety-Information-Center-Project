<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\CekAPDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanAPDController;
use App\Http\Controllers\RiwayatPengambilanController;
use App\Http\Controllers\StokAPDController;
use App\Http\Controllers\SOPIK\DashboardSOPIKController;
use App\Http\Controllers\SOPIK\SopController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/karyawan', [DataKaryawanController::class, 'index'])->name('karyawan.index');
    Route::post('/karyawan', [DataKaryawanController::class, 'store'])->name('karyawan.store');
    Route::put('/karyawan/{id}', [DataKaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/{id}', [DataKaryawanController::class, 'destroy'])->name('karyawan.destroy');
    Route::post('/karyawan/bulk-delete', [DataKaryawanController::class, 'bulkDelete'])->name('karyawan.bulk-delete');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cek-apd', [CekAPDController::class, 'cekAPD'])->name('cek-apd');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pengajuan-apd', [PengajuanAPDController::class, 'create'])->name('pengajuan-apd.create');
    Route::post('/pengajuan-apd', [PengajuanAPDController::class, 'store'])->name('pengajuan-apd.store');   
    Route::get('/get-user-by-nik', [PengajuanAPDController::class, 'getUserByNIK'])->name('get-user-by-nik');
    Route::post('/preview-potongan', [PengajuanAPDController::class, 'previewPotongan'])->name('preview-potongan');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat-pengambilan', [RiwayatPengambilanController::class, 'index'])->name('riwayat-pengambilan.index');
    Route::get('/potong-gaji', [RiwayatPengambilanController::class, 'potongGaji'])->name('potong-gaji');
    Route::get('/apd-ku', [RiwayatPengambilanController::class, 'riwayatUser'])->name('riwayat-apd.user');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/stok-apd', [StokAPDController::class, 'index'])->name('stok-apd.index');
    Route::post('/stok-apd', [StokAPDController::class, 'store'])->name('stok-apd.store');
    Route::put('/stok-apd/{id}', [StokAPDController::class, 'update'])->name('stok-apd.update');
    Route::delete('/stok-apd/{id}', [StokAPDController::class, 'destroy'])->name('stok-apd.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/sop-ik/dashboard', [DashboardSOPIKController::class, 'tampilkanHalamanDashboard'])->name('sop-ik.dashboard');

    Route::prefix('/sop-ik/sop')->group(function () {
        Route::get('/', [SopController::class, 'index'])->name('sop-ik.sop.index');
        Route::get('/tambah', [SopController::class, 'create'])->name('sop-ik.sop.create');
        Route::post('/', [SopController::class, 'store'])->name('sop-ik.sop.store');
        Route::get('/{sop}/edit', [SopController::class, 'edit'])->name('sop-ik.sop.edit');
        Route::put('/{sop}', [SopController::class, 'update'])->name('sop-ik.sop.update');
        Route::delete('/{sop}', [SopController::class, 'destroy'])->name('sop-ik.sop.destroy');
        Route::get('/daftar-sop', [SopController::class, 'daftarSOP'])->name('sop-ik.sop.daftar');
    });
});

require __DIR__.'/auth.php';
