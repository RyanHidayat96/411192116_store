<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;

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
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/tambahdatabarang', [BarangController::class, 'tambahdatabarang'])->name('tambahdatabarang');
Route::post('/insertdatabarang', [BarangController::class, 'insertdatabarang'])->name('insertdatabarang');
Route::get('/tampildatabarang/{id}', [BarangController::class, 'tampildatabarang'])->name('tampildatabarang');
Route::post('/updatedatabarang/{id}', [BarangController::class, 'updatedatabarang'])->name('updatedatabarang');
Route::get('/deletedatabarang/{id}', [BarangController::class, 'deletedatabarang'])->name('deletedatabarang');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
Route::get('/tambahdatapelanggan', [PelangganController::class, 'tambahdatapelanggan'])->name('tambahdatapelanggan');
Route::post('/insertdatapelanggan', [PelangganController::class, 'insertdatapelanggan'])->name('insertdatapelanggan');
Route::get('/tampildatapelanggan/{id}', [PelangganController::class, 'tampildatapelanggan'])->name('tampildatapelanggan');
Route::post('/updatedatapelanggan/{id}', [PelangganController::class, 'updatedatapelanggan'])->name('updatedatapelanggan');
Route::get('/deletedatapelanggan/{id}', [PelangganController::class, 'deletedatapelanggan'])->name('deletedatapelanggan');

Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('/tambahdatapenjualan', [PenjualanController::class, 'tambahdatapenjualan'])->name('tambahdatapenjualan');
Route::post('/insertdatapenjualan', [PenjualanController::class, 'insertdatapenjualan'])->name('insertdatapenjualan');
Route::get('/tampildatapenjualan/{id}', [PenjualanController::class, 'tampildatapenjualan'])->name('tampildatapenjualan');
Route::post('/updatedatapenjualan/{id}', [PenjualanController::class, 'updatedatapenjualan'])->name('updatedatapenjualan');
Route::get('/deletedatapenjualan/{id}', [PenjualanController::class, 'deletedatapenjualan'])->name('deletedatapenjualan');
