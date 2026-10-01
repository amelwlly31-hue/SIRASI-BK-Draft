<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\TindakLanjutController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\PengaturanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/riwayat-siswa', [SiswaController::class, 'riwayat'])
    ->name('siswa.riwayat');

Route::patch('/siswa/{id}/toggle-status', [SiswaController::class, 'toggleStatus'])
    ->name('siswa.toggleStatus');

Route::post('/siswa/import', [SiswaController::class, 'import'])
    ->name('siswa.import');

Route::resource('siswa', SiswaController::class);

Route::get('/siswa/{id}/surat-panggilan', [SiswaController::class, 'suratPanggilan'])
    ->middleware('auth')
    ->name('siswa.surat_panggilan');

Route::get('/siswa/{id}/surat-panggilan/pdf', [SiswaController::class, 'suratPanggilanPdf'])
    ->middleware('auth')
    ->name('siswa.surat_panggilan.pdf');

Route::get('/siswa/{id}/surat-panggilan/docx', [SiswaController::class, 'suratPanggilanDocx'])
    ->middleware('auth')
    ->name('siswa.surat_panggilan.docx');

Route::resource('konseling', KonselingController::class);

Route::get('/notifikasi/{id}/baca', [KonselingController::class, 'bacaNotifikasi'])
    ->middleware('auth')
    ->name('notifikasi.baca');

Route::resource('tindak_lanjut', TindakLanjutController::class);

Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');

Route::get('/laporan/per-siswa', [LaporanController::class, 'perSiswa'])
    ->name('laporan.per_siswa');

Route::get('/laporan/rekap-masalah', [LaporanController::class, 'rekapMasalah'])
    ->name('laporan.rekap_masalah');

Route::resource('penjadwalan', PenjadwalanController::class);

Route::get('/pengaturan', [PengaturanController::class, 'index'])
    ->middleware('auth')
    ->name('pengaturan.index');

Route::put('/pengaturan/profil', [PengaturanController::class, 'updateProfile'])
    ->middleware('auth')
    ->name('pengaturan.profil.update');

Route::put('/pengaturan/password', [PengaturanController::class, 'updatePassword'])
    ->middleware('auth')
    ->name('pengaturan.password.update');

Route::get('/profile-photo/{filename}', function ($filename) {
    $path = storage_path('app/public/profile/' . basename($filename));

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->middleware('auth')->name('profile.photo');
