<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\BeliProdukController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\ListOrderAdminController;

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


// HOME LANDING PAGE
Route::get('/', [ProdukController::class, 'index']);
// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authentication']);
// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
// REGISTRASI
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// DASHBOARD PRODUK ADMIN
Route::resource('/dashboard/produks', ProdukAdminController::class)->middleware('auth');
// DASHBOARD ADMIN
Route::resource('/dashboard/users', UserAdminController::class)->middleware('auth');
// DETAIL PESANAN LEBIH DARI 1
Route::get('/detailpesanansemua', [OrderController::class, 'detailsemua']);

// PESANAN SAYA
Route::get('/pesanansaya', [OrderController::class, 'pesanansaya'])->middleware('auth');
// DETAIL PRODUK USER
Route::get('/{Produk:id}', [ProdukController::class, 'detail'])->middleware('auth');
// TAMBAH KERANJANG USER
Route::post('/keranjang/{id}', [ProdukController::class, 'store'])->middleware('auth');
Route::post('/keranjang/{Keranjang:id}', [ProdukController::class, 'destroy'])->middleware('auth');
// BELI
Route::get('/beli/{Produk:id}', [BeliProdukController::class, 'index'])->middleware('auth');
Route::post('/beli', [BeliProdukController::class, 'checkoutDariKeranjang'])->middleware('auth');
// ORDER
Route::resource('/order', OrderController::class)->middleware('auth');
Route::post('/orderKeranjang', [OrderController::class, 'order_keranjang']);
// DETAIL PESANAN 1
Route::get('/detailPesanan/{Order:id}', [OrderController::class, 'detail'])->middleware('auth');
// LIST ORDER ADMIN
Route::get('/dashboard/listorder', [OrderController::class, 'alllistorder'])->middleware('auth');
Route::get('/dashboard/listorder/{Order:id}', [OrderController::class, 'edit_listOrder'])->middleware('auth');
Route::post('/dashboard/listorder/{Order:id}', [OrderController::class, 'update_listOrder'])->middleware('auth');
