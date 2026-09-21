<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\FasilitasController as AdminFasilitasController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\EkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\DashboardController;

// ===== ROUTE PUBLIK (Website Sekolah) =====
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/profil-sekolah', [ProfilController::class, 'index'])->name('profil');
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'show'])->name('ekstrakurikuler.show');
Route::get('/guru-staff', [GuruController::class, 'index'])->name('guru');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('galeri.show');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi-misi');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/akreditasi', [AkreditasiController::class, 'index'])->name('akreditasi');
Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');
Route::post('/ekstrakurikuler/{ekstrakurikuler}/galeri', [AdminEkstrakurikulerController::class, 'storeGaleri'])->name('ekstrakurikuler.galeri.store');

// ===== ROUTE ADMIN (Panel Kelola Konten) =====
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('berita', AdminBeritaController::class)->except('show')->parameters(['berita' => 'berita']);
    Route::resource('galeri', AdminGaleriController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('jurusan', AdminJurusanController::class)->except('show');
    Route::resource('fasilitas', \App\Http\Controllers\Admin\FasilitasController::class)->except('show')->parameters(['fasilitas' => 'fasilitas']);
    Route::resource('akreditasi', \App\Http\Controllers\Admin\AkreditasiController::class)->except('show');
    Route::resource('ekstrakurikuler', AdminEkstrakurikulerController::class)->except('show');
    Route::post('/ekstrakurikuler/{ekstrakurikuler}/galeri', [AdminEkstrakurikulerController::class, 'storeGaleri'])->name('ekstrakurikuler.galeri.store');
    Route::resource('pesan', \App\Http\Controllers\Admin\PesanController::class)->only(['index', 'show', 'destroy']);
    Route::resource('pembiasaan', \App\Http\Controllers\Admin\PembiasaanController::class)->except('show');
    Route::resource('seragam', \App\Http\Controllers\Admin\SeragamController::class)->except('show');
    Route::resource('guru', AdminGuruController::class)->except('show');
    Route::get('/profil', [AdminProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');
});

require __DIR__ . '/auth.php';
