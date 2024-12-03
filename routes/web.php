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
Route::get('/tambahpasien', [AdminController::class, 'tambahpasien'])->name('tambahpasien');
                    // =====ROUTE PROCCES PASIEN=====//
Route::post('/storepasien', [AdminController::class, 'storepasien'])->name('storepasien');

