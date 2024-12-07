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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
                        // ==== ROUTE VIEW === //
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [AdminController::class, 'index'])->name('index');
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
Route::get('/listdataobat', [AdminController::class, 'listdataobat'])->name('listdataobat');
Route::get('/tambahobat', [AdminController::class, 'tambahobat'])->name('tambahobat');

Route::get('/transaksiobat/{id}', [AdminController::class, 'transaksiobat'])->name('transaksiobat');
// Route::get('/transaksiobat', [AdminController::class, 'transaksiobat'])->name('transaksiobat');

Route::post('/storeobat', [AdminController::class, 'storeobat'])->name('storeobat');
Route::post('/storetransaksiobat', [AdminController::class, 'storetransaksiobat'])->name('storetransaksiobat');

