<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\DetailProyekController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MaterialPemasokController;
use App\Http\Controllers\MaterialProyekController;
use App\Http\Controllers\OrderMaterialController;

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

    // // Rute kontrak untuk admin (CRUD lengkap)
    // Route::resource('kontrak', KontrakController::class)->names([
    //     'index' => 'admi.kontrak.index',
    //     'create' => 'admin.kontrak.create',
    //     'store' => 'admin.kontrak.store',
    //     'edit' => 'admin.kontrak.edit',
    //     'update' => 'admin.kontrak.update',
    //     'destroy' => 'admin.kontrak.destroy',
    // ]);

    Route::resource('proyek', ProyekController::class)->names([
        'index' => 'admin.proyek.index', // Menetapkan nama rute untuk index
        'create' => 'admin.proyek.create',
        'store' => 'admin.proyek.store',
        'edit' => 'admin.proyek.edit',
        'update' => 'admin.proyek.update',
        'destroy' => 'admin.proyek.destroy'
    ]);

    Route::prefix('admin/{proyek_id}')->name('admin.')->group(function () {
        Route::resource('detail_proyek', DetailProyekController::class)->names([
            'index' => 'detail_proyek.index',
            'create' => 'detail_proyek.create',
            'store' => 'detail_proyek.store',
            'edit' => 'detail_proyek.edit',
            'update' => 'detail_proyek.update',
            'destroy' => 'detail_proyek.destroy',
        ]);
    });


});


Route::middleware(['auth', 'admin'])->group(callback: function () {

    // =============================================
    // =           Route Pengiriman                =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pengiriman', [PengirimanController::class, 'index'])->name('admin.pengiriman');
    Route::get('/admin/pengiriman/create', [PengirimanController::class, 'create'])->name('admin.pengiriman.create');
    Route::post('admin/pengiriman/store', [PengirimanController::class, 'store'])->name('admin.pengiriman.store');
    Route::get('/admin/pengiriman/{id}/edit', [PengirimanController::class, 'edit'])->name('admin.pengiriman.edit');
    Route::put('/admin/pengiriman/{id}', [PengirimanController::class, 'update'])->name('admin.pengiriman.update');
    Route::delete('/admin/pengiriman/{id}', [PengirimanController::class, 'destroy'])->name('admin.pengiriman.destroy');

    // =============================================
    // =               Route PROYEK                =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/proyek', [ProyekController::class, 'index'])->name('admin.proyek');
    Route::get('/admin/proyek/create', [ProyekController::class, 'create'])->name('admin.proyek.create');
    Route::post('admin/proyek/store', [ProyekController::class, 'store'])->name('admin.proyek.store');
    Route::get('/admin/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('admin.proyek.edit');
    Route::put('/admin/proyek/{id}', [ProyekController::class, 'update'])->name('admin.proyek.update');
    Route::delete('/admin/proyek/{id}', [ProyekController::class, 'destroy'])->name('admin.proyek.destroy');


    // =============================================
    // =           Route Detail Proyek             =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/{proyek_id}/detail_proyek', [DetailProyekController::class, 'index'])->name('admin.detail_proyek.index');

    Route::get('/admin/{proyek_id}/detail_proyek/create', [DetailProyekController::class, 'create'])->name('admin.detail_proyek.create');
    Route::post('/admin/{proyek_id}/detail_proyek/store', [DetailProyekController::class, 'store'])->name('admin.detail_proyek.store');
    Route::get('/admin/{proyek_id}/detail_proyek/{id}/edit', [DetailProyekController::class, 'edit'])->name('admin.detail_proyek.edit');
    Route::put('/admin/{proyek_id}/detail_proyek/{id}', [DetailProyekController::class, 'update'])->name('admin.detail_proyek.update');
    Route::delete('/admin/{proyek_id}/detail_proyek/{id}', [DetailProyekController::class, 'destroy'])->name('admin.detail_proyek.destroy');
    Route::get('admin/{proyek_id}/detail_proyek/export/pdf', [DetailProyekController::class, 'exportPDF'])->name('admin.detail_proyek.exportPDF');

    // =============================================
    // =           Route Material                  =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/material', [MaterialPemasokController::class, 'indexForAdmin'])->name('admin.material');


    // =============================================
    // =           Route Order Material            =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/order', [OrderMaterialController::class, 'index'])->name('admin.order');
    Route::get('/admin/order/create', [OrderMaterialController::class, 'create'])->name('admin.order.create');
    Route::post('admin/order/store', [OrderMaterialController::class, 'store'])->name('admin.order.store');
    Route::get('/admin/order/{id}/edit', [OrderMaterialController::class, 'edit'])->name('admin.order.edit');
    Route::put('/admin/order/{id}', [OrderMaterialController::class, 'update'])->name('admin.order.update');
    Route::delete('/admin/order/{id}', [OrderMaterialController::class, 'destroy'])->name('admin.order.destroy');

    // =============================================
    // =            Route Pemasok Admin            =
    // =============================================

    Route::get('/admin/pemasok', [PemasokController::class, 'index'])->name('admin.pemasok');
    Route::get('/admin/pemasok/create', [PemasokController::class, 'create'])->name('admin.pemasok.create');
    Route::post('admin/pemasok/store', [PemasokController::class, 'store'])->name('admin.pemasok.store');
    Route::get('/admin/pemasok/{id}/edit', [PemasokController::class, 'edit'])->name('admin.pemasok.edit');
    Route::put('/admin/pemasok/{id}', [PemasokController::class, 'update'])->name('admin.pemasok.update');
    Route::delete('/admin/pemasok/{id}', [PemasokController::class, 'destroy'])->name('admin.pemasok.destroy');

    // =============================================
    // =             Route Kontrak                 =
    // =============================================

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/kontrak', [KontrakController::class, 'index'])->name('admin.kontrak.home');
    Route::get('/admin/kontrak/create', [KontrakController::class, 'create'])->name('admin.kontrak.create');
    Route::post('admin/kontrak/store', [KontrakController::class, 'store'])->name('admin.kontrak.store');
    Route::get('/admin/kontrak/{id}/edit', [KontrakController::class, 'edit'])->name('admin.kontrak.edit');
    Route::put('/admin/kontrak/{id}', [KontrakController::class, 'update'])->name('admin.kontrak.update');
    Route::delete('/admin/kontrak/{id}', [KontrakController::class, 'destroy'])->name('admin.kontrak.destroy');

    Route::prefix('material-proyek')->group(function () {
        Route::get('/', [MaterialProyekController::class, 'index'])->name('material_proyek.index');
        Route::post('/sync', [MaterialProyekController::class, 'syncFromPengiriman'])->name('material_proyek.sync');
    });


    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

});


// =============================================
// =                Route USER                 =
// =============================================

Route::middleware('auth')->group(function () {
    Route::get('/pengiriman', [PengirimanController::class, 'indexForUser'])->name('pengiriman.index');
    Route::get('/proyek', [ProyekController::class, 'indexForUser'])->name('proyek.index');
    Route::get('/order', [OrderMaterialController::class, 'indexForUser'])->name('user.order');



    Route::get('/pemasok', [PemasokController::class, 'index'])->name('user.pemasok');
    Route::get('/pemasok/create', [PemasokController::class, 'create'])->name('user.pemasok.create');
    Route::post('/pemasok/store', [PemasokController::class, 'store'])->name('user.pemasok.store');
    Route::get('/pemasok/{id}/edit', [PemasokController::class, 'edit'])->name('user.pemasok.edit');
    Route::put('/pemasok/{id}', [PemasokController::class, 'update'])->name('user.pemasok.update');
    Route::delete('/pemasok/{id}', [PemasokController::class, 'destroy'])->name('user.pemasok.destroy');

    Route::get('/material', [MaterialPemasokController::class, 'index'])->name('user.material');
    Route::get('/material/create', [MaterialPemasokController::class, 'create'])->name('user.material.create');
    Route::post('/material/store', [MaterialPemasokController::class, 'store'])->name('user.material.store');
    Route::get('/material/{id}/edit', [MaterialPemasokController::class, 'edit'])->name('user.material.edit');
    Route::put('/material/{id}', [MaterialPemasokController::class, 'update'])->name('user.material.update');
    Route::delete('/material/{id}', [MaterialPemasokController::class, 'destroy'])->name('user.material.destroy');
});







// Sertakan rute autentikasi
require __DIR__ . '/auth.php';
