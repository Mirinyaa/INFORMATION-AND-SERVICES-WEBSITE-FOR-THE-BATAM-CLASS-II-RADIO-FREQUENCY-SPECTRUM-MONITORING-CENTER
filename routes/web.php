<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
Use App\Http\Controllers\AdminController;
Use App\Http\Controllers\UserController;

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
    return view('frontend.index');
});

Route::get('/login', function () {
    return view('backend.auth.login');
});

Route::get('/galeri', function () {
    return view('frontend.galeri');
});

Route::get('/izin-amatir', function () {
    return view('frontend.izinamatir');
});

Route::get('/kontak', function () {
    return view('frontend.kontak');
});


Route::get('/perpanjangan', function () {
    return view('frontend.perpanjangan');
});


Route::get('/struktur', function () {
    return view('frontend.struktur');
});

Route::get('/kontak', function () {
    return view('frontend.kontak');
});

Route::get('/tugas-dan-fungsi', function () {
    return view('frontend.tugasfungsi');
});

Route::get('/visi-dan-misi', function () {
    return view('frontend.visimisi');
});


Route::get('/izin-spektrum', function () {
    return view('frontend.izinspektrum');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.index');
    Route::get('/edit-profile/{nama}', [DashboardController::class, 'edit_profile']);
   
    // User routes
    Route::get('/barang', [UserController::class, 'barang']);
    Route::post('/pinjam-barang', [UserController::class, 'pinjam'])->name('user.pinjam');
    Route::get('/search/barang', [DashboardController::class, 'searchBarang']);
    Route::get('/history-peminjaman-barang', [UserController::class, 'historyPeminjaman']);
    Route::get('/barang-return/search', [UserController::class, 'barangReturn']);
    // Profile routes
    Route::post('/update-profile/{id}', [DashboardController::class, 'updateProfile']);
});

// Authentication routes
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::post('/logout', [LogoutController::class, '__invoke'])->name('logout');




Route::middleware(['checkUserRole:superadmin,admin', 'auth'])->group(function () {

    Route::get('/returned', [BarangController::class, 'barang_kembali']);
    Route::get('/list-barang', [BarangController::class, 'index']);
    // Barang routes
    Route::post('/tambah-barang', [BarangController::class, 'store']);
    Route::get('/cari-barang', [BarangController::class, 'searchBarang']);
    Route::post('/update-data-barang/{id}', [BarangController::class, 'update']);
    Route::delete('/hapus-barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    // Peminjaman routes
    Route::get('/peminjaman_barang', [PeminjamanController::class, 'peminjaman_barang']);
    Route::post('/peminjamans', [PeminjamanController::class, 'store'])->name('peminjamans.store');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjamans.index');
    Route::get('/pengembalian-barang/{id}', [PeminjamanController::class, 'completePengembalian'])->name('peminjamans.completePengembalian');
    Route::get('/peminjaman-barang/search', [PeminjamanController::class, 'searchPeminjaman'])->name('peminjaman_barang.search');
    Route::get('/barang/search', [BarangController::class, 'barangSearch']);
    Route::get('/cetak-pdf', [BarangController::class, 'cetakPDF']);

    //hapus-history-barang
    Route::get('/delete-history/{id}', [PeminjamanController::class, 'destroy']);

     // Admin routes
     Route::get('/admin', [AdminController::class, 'index']);
});


Route::middleware(['checkUserRole:superadmin', 'auth'])->group(function () {
// Pegawai routes
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/pegawai/search', [PegawaiController::class, 'pegawaiSearch']);
    Route::post('/tambah-data-pegawai', [PegawaiController::class, 'create']);
    Route::post('/update-data-pegawai/{id}', [PegawaiController::class, 'update']);
    Route::delete('/delete/{id}', [PegawaiController::class, 'destroy']);

    });


    Route::group(['prefix' => 'peminjamans', 'as' => 'peminjamans.'], function () {
        // ... Rute-rute lainnya ...

        // Rute untuk menyetujui permintaan peminjaman
        Route::get('approve/{id}', [PeminjamanController::class, 'approve'])->name('approve');

        // Rute untuk menolak permintaan peminjaman
        Route::get('reject/{id}', [PeminjamanController::class, 'reject'])->name('reject');
});