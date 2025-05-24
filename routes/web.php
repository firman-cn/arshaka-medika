<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

                        // ==== ROUTE VIEW === //

Route::middleware(['auth', 'role:admin|superadmin'])->group(function () {
    Route::get('/tambahuser', [AdminController::class, 'tambahuser'])->name('tambahuser');
    Route::post('/storeuser', [AdminController::class, 'storeuser'])->name('storeuser');
    Route::put('/updateuser/{$id}',[AdminController::class,'updateuser'])->name('updateuser');
});                        

Route::middleware(['auth', 'role:admin|superadmin'])->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('index');

});

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/listdatapasien', [AdminController::class, 'listdatapasien'])->name('listdatapasien');
Route::get('/tambahpasien', [AdminController::class, 'tambahpasien'])->name('tambahpasien');

Route::get('/listpemeriksaan', [AdminController::class, 'listpemeriksaan'])->name('listpemeriksaan');

                            // =====ROUTE PROCCES PASIEN=====//
Route::post('/storepasien', [AdminController::class, 'storepasien'])->name('storepasien');

                             // =====ROUTE PROCCES PEMERIKSAAN=====//
Route::get('/pemeriksaan', [AdminController::class, 'pemeriksaan'])->name('pemeriksaan');
Route::get('/carinorekammedis', [AdminController::class, 'carinorekammedis'])->name('carinorekammedis');
Route::post('/storepemeriksaan', [AdminController::class, 'storepemeriksaan'])->name('storepemeriksaan');
                            // =====ROUTE PROCCES OBAT=====//
Route::get('/listransaksiobat', [AdminController::class, 'listransaksiobat'])->name('listransaksiobat');

Route::get('/listdataobat', [AdminController::class, 'listdataobat'])->name('listdataobat');
Route::get('/tambahobat', [AdminController::class, 'tambahobat'])->name('tambahobat');

Route::post('updatestok/{id}', [AdminController::class, 'updatestok'])->name('updatestok');

Route::get('/transaksiobat/{id}', [AdminController::class, 'transaksiobat'])->name('transaksiobat');
// Route::get('/transaksiobat', [AdminController::class, 'transaksiobat'])->name('transaksiobat');

Route::post('/storeobat', [AdminController::class, 'storeobat'])->name('storeobat');
Route::post('/storetransaksiobat', [AdminController::class, 'storetransaksiobat'])->name('storetransaksiobat');

Route::get('/cetaktransaksiobat/{kode_transaksi}', [AdminController::class, 'cetaktransaksiobat'])->name('cetaktransaksiobat');
Route::get('/cetakpemeriksaan/{id}', [AdminController::class, 'cetakpemeriksaan'])->name('cetakpemeriksaan');

Route::post('updateHargaPelayanan/{id}', [AdminController::class, 'updateHargaPelayanan'])->name('updateHargaPelayanan');

// Route::post('/updateHargaPelayanan', [AdminController::class, 'updateHargaPelayanan'])->name('updateHargaPelayanan');
