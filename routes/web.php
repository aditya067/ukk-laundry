<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
Use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

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

Route::middleware('guest')->group(function () {
	Route::get('/register', [OutletController::class, 'register'])->name('register');
	Route::post('/register-post', [OutletController::class, 'doRegister'])->name('outlet.register');

	Route::get('/login', [UserController::class, 'login'])->name('login');
	Route::post('/login-post', [UserController::class, 'doLogin'])->name('user.login');
});

Route::middleware('auth')->group(function () {

	Route::middleware('can:role, "Admin"')->group(function(){

		Route::get('paket', [PageController::class, 'paket'])->name('paket');
		Route::get('pengguna', [PageController::class, 'pengguna'])->name('pengguna');
		Route::get('pengaturan', [PageController::class, 'pengaturan'])->name('pengaturan');

		Route::get('paket/add', [PaketController::class, 'add'])->name('paket.add');
		Route::post('paket.store', [PaketController::class, 'store'])->name('paket.store');
		Route::get('paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
		Route::post('paket/update/{id}', [PaketController::class, 'update'])->name('paket.update');
		Route::get('paket/delete/{id}', [PaketController::class, 'delete'])->name('paket.delete');

		Route::get('pengguna/add', [UserController::class, 'add'])->name('pengguna.add');
		Route::post('pengguna.store', [UserController::class, 'store'])->name('pengguna.store');
		Route::get('pengguna/edit/{id}', [UserController::class, 'edit'])->name('pengguna.edit');
		Route::post('pengguna/update/{id}', [UserController::class, 'update'])->name('pengguna.update');
		Route::get('pengguna/delete/{id}', [UserController::class, 'delete'])->name('pengguna.delete');	
		
		Route::post('outlet/update', [OutletController::class, 'update'])->name('outlet.update');
		Route::post('outlet/delete', [OutletController::class, 'delete'])->name('outlet.delete');
	});

	Route::middleware('can:role, "Admin", "Kasir"')->group(function(){

		Route::get('transaksi', [PageController::class, 'transaksi'])->name('transaksi');

		Route::get('pelanggan/add', [PelangganController::class, 'add'])->name('pelanggan.add');
		Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

		Route::get('transaksi/detail/show/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
		Route::get('transaksi/pelanggan/{id}', [TransaksiController::class, 'pelanggan'])->name('transaksi.pelanggan');
		Route::get('transaksi/pelanggan/{id}/add', [TransaksiController::class, 'pelangganAdd'])->name('transaksi.pelanggan.add');
		Route::post('transaksi/pelanggan/{id}/store', [TransaksiController::class, 'pelangganStore'])->name('transaksi.pelanggan.store');
		Route::post('transaksi/detail/{id}/store', [TransaksiController::class, 'transaksiDetailStore'])->name('transaksi.detail.store');	
	});

	Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');

	Route::get('laporan', [PageController::class, 'laporan'])->name('laporan');
	Route::get('laporan/generate', [PageController::class, 'laporanGenerate'])->name('laporan.generate');

	Route::post('logout', [UserController::class, 'logout'])->name('logout');
});
