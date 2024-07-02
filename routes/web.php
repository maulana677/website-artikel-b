<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\KategoriWilayahController;
use App\Http\Controllers\Admin\PendafataranController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Frontend\HomeController;
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

// Route::get('/', function () {
//     return view('frontend.home');
// });

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pendaftaran/{id}/download-cv', [PendaftaranController::class, 'downloadCV'])->name('pendaftaran.download-cv');


Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
Route::delete('pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');

Route::resource('categories', CategoryController::class);

Route::resource('artikel', ArtikelController::class);

Route::resource('kategori-wilayah', KategoriWilayahController::class);

Route::resource('event', EventController::class);
