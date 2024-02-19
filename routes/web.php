<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
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

Route::get('product', function () {
    return view('addData');
});

// Route::get('register', function () {
//     return view('register');
// });

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('customer', function () {
    return view('customer');
});

Route::get('/', [SesiController::class, 'index'])->name('login');
Route::post('/', [SesiController::class, 'login']);

Route::get('register', [RegisterController::class, 'form'])->name('register');
Route::post('/save', [RegisterController::class, 'save'])->name('save');

Route::middleware(['auth'])->group(function() {
    Route::get('dashboard/logout', [SesiController::class, 'logout']);
    
    Route::get('dashboard/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('dashboard/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');
});

