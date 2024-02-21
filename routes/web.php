<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
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

// untuk login
Route::get('/', [SesiController::class, 'index'])->name('login');
Route::post('/', [SesiController::class, 'login']);

// untuk register
Route::get('register', [RegisterController::class, 'form'])->name('register');
Route::post('/save', [RegisterController::class, 'save'])->name('save');

// jika sudah login
Route::middleware(['auth'])->group(function() {
    Route::get('dashboard/logout', [SesiController::class, 'logout']);
    
    Route::get('dashboard/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('dashboard/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');

});

// CRUD produk
// menampilkan form
Route::get('product', [ProdukController::class, 'index'])->name('product');
Route::get('addproduct', [ProdukController::class, 'addproduct'])->name('addproduct');

// menginput data
Route::post('insertproduct', [ProdukController::class, 'insertproduct'])->name('insertproduct');

// mengedit data
Route::get('viewproduct/{id}', [ProdukController::class, 'viewproduct'])->name('viewproduct');
Route::post('updateproduct/{id}', [ProdukController::class, 'updateproduct'])->name('updateproduct');

// menghapus data
Route::get('deleteproduct/{id}', [ProdukController::class, 'delete'])->name('deleteproduct');

// CRUD user
// menampilkan form
Route::get('user', [UserController::class, 'index'])->name('user');
Route::get('adduser', [UserController::class, 'adduser'])->name('adduser');

// menginput data
Route::post('insertuser', [UserController::class, 'insertuser'])->name('insertuser');

// mengedit data
Route::get('viewuser/{id}', [UserController::class, 'viewuser'])->name('viewuser');
Route::post('updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');

// menghapus data
Route::get('deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

// CRUD pelanggan
// menampilkan form
Route::get('customer', [PelangganController::class, 'index'])->name('customer');
Route::get('addcust', [PelangganController::class, 'addcust'])->name('addcust');

// menginput data
Route::post('insertcust', [PelangganController::class, 'insertcust'])->name('insertcust');

// mengedit data
Route::get('viewcust/{id}', [PelangganController::class, 'viewcust'])->name('viewcust');
Route::post('updatecust/{id}', [PelangganController::class, 'updatecust'])->name('updatecust');

// menghapus data
Route::get('deletecust/{id}', [PelangganController::class, 'deletecust'])->name('deletecust');

// CRUD penjualan
// menampilkan form
Route::get('transaction', [PenjualanController::class, 'index'])->name('transaction');
Route::get('addtransaction', [PenjualanController::class, 'addtransaction'])->name('addtransaction');

// menginput data
Route::post('inserttransaction', [PenjualanController::class, 'inserttransaction'])->name('inserttransaction');

// mengedit data
Route::get('viewtransaction/{id}', [PenjualanController::class, 'viewtransaction'])->name('viewtransaction');