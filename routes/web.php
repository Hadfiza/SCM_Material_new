<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\DetailProyekController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard user biasa (dengan autentikasi)
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup rute untuk pengguna dengan middleware 'auth'
Route::middleware('auth')->group(function () {
    // Rute profil pengguna
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rute pengiriman untuk pengguna biasa (hanya melihat pengiriman)
    Route::get('/pengiriman', [PengirimanController::class, 'indexForUser'])->name('pengiriman.index');

    // Rute pemasok untuk pengguna (user hanya bisa melihat daftar pemasok dan menambah pemasok)
    Route::prefix('pemasok')->group(function () {
        Route::get('/', [PemasokController::class, 'index'])->name('pemasok.index'); // Menambahkan rute untuk melihat daftar pemasok
        Route::get('/create', [PemasokController::class, 'create'])->name('pemasok.create');
        Route::post('/', [PemasokController::class, 'store'])->name('pemasok.store');
    });

    // Rute kontrak (user hanya bisa melihat kontrak)
    Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak.index');
});

// Grup rute admin dengan middleware 'auth' dan 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Rute pengiriman untuk admin (CRUD)
    Route::resource('pengiriman', PengirimanController::class)->names([
        'index' => 'pengiriman.index',
        'create' => 'pengiriman.create',
        'store' => 'pengiriman.store',
        'edit' => 'pengiriman.edit',
        'update' => 'pengiriman.update',
        'destroy' => 'pengiriman.destroy',
    ]);


    // Rute pemasok untuk admin (CRUD lengkap)
    Route::resource('pengiriman', PengirimanController::class)->names([
        'index' => 'admin.pengiriman.index', // Menetapkan nama rute untuk index
        'create' => 'admin.pengiriman.create',
        'store' => 'admin.pengiriman.store',
        'edit' => 'admin.pengiriman.edit',
        'update' => 'admin.pengiriman.update',
        'destroy' => 'admin.pengiriman.destroy'
    ]);

    // Rute kontrak untuk admin (CRUD lengkap)
    Route::resource('kontrak', KontrakController::class)->names([
        'index' => 'kontrak.index',
        'create' => 'kontrak.create',
        'store' => 'kontrak.store',
        'edit' => 'kontrak.edit',
        'update' => 'kontrak.update',
        'destroy' => 'kontrak.destroy',
    ]);

    Route::resource('proyek', ProyekController::class)->names([
        'index' => 'admin.proyek.index', // Menetapkan nama rute untuk index
        'create' => 'admin.proyek.create',
        'store' => 'admin.proyek.store',
        'edit' => 'admin.proyek.edit',
        'update' => 'admin.proyek.update',
        'destroy' => 'admin.proyek.destroy'
    ]);

    Route::resource('detail_proyek', DetailProyekController::class)->names([
        'index' => 'admin.detail_proyek.index', // Menetapkan nama rute untuk index
        'create' => 'admin.detail_proyek.create',
        'store' => 'admin.detail_proyek.store',
        'edit' => 'admin.detail_proyek.edit',
        'update' => 'admin.detail_proyek.update',
        'destroy' => 'admin.detail_proyek.destroy'
    ]);


});


Route::middleware(['auth', 'admin'])->group(callback: function () {

    // =============================================
    // =           Route Pengiriman                =
    // =============================================
    
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pengiriman', [PengirimanController::class, 'index'])->name('admin.pengiriman');
    Route::get('/admin/pengiriman/create', [PengirimanController::class, 'create'])->name('admin.pengiriman.create');
    Route::post('admin/pengiriman/store', [PengirimanController::class,'store'])->name('admin.pengiriman.store');
    Route::get('/admin/pengiriman/{id}/edit', [PengirimanController::class, 'edit'])->name('admin.pengiriman.edit');
    Route::put('/admin/pengiriman/{id}', [PengirimanController::class, 'update'])->name('admin.pengiriman.update');
    Route::delete('/admin/pengiriman/{id}', [PengirimanController::class, 'destroy'])->name('admin.pengiriman.destroy');

    // =============================================
    // =               Route PROYEK                =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/proyek', [ProyekController::class, 'index'])->name('admin.proyek');
    Route::get('/admin/proyek/create', [ProyekController::class, 'create'])->name('admin.proyek.create');
    Route::post('admin/proyek/store', [ProyekController::class,'store'])->name('admin.proyek.store');
    Route::get('/admin/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('admin.proyek.edit');
    Route::put('/admin/proyek/{id}', [ProyekController::class, 'update'])->name('admin.proyek.update');
    Route::delete('/admin/proyek/{id}', [ProyekController::class, 'destroy'])->name('admin.proyek.destroy');


    // =============================================
    // =           Route Detail Proyek             =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/detail_proyek', [DetailProyekController::class, 'index'])->name('admin.detail_proyek');
    Route::get('/admin/detail_proyek/create', [DetailProyekController::class, 'create'])->name('admin.detail_proyek.create');
    Route::post('admin/detail_proyek/store', [DetailProyekController::class,'store'])->name('admin.detail_proyek.store');
    Route::get('/admin/detail_proyek/{id}/edit', [DetailProyekController::class, 'edit'])->name('admin.detail_proyek.edit');
    Route::put('/admin/detail_proyek/{id}', [DetailProyekController::class, 'update'])->name('admin.detail_proyek.update');
    Route::delete('/admin/detail_proyek/{id}', [DetailProyekController::class, 'destroy'])->name('admin.detail_proyek.destroy');
});

    // =============================================
    // =                Route USER                 =
    // =============================================

Route::middleware('auth')->group(function () {
    Route::get('/pengiriman', [PengirimanController::class, 'indexForUser'])->name('pengiriman.index');
    Route::get('/proyek', [ProyekController::class, 'indexForUser'])->name('proyek.index');
});




// Sertakan rute autentikasi
require __DIR__ . '/auth.php';
