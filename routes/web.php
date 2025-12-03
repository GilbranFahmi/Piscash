<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\OpenDrawerController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\CloseDrawerController;


Route::get('/', fn() => redirect('/login'));



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth.kasir')->group(function () {

 
    Route::get('/home', [AuthController::class, 'home'])->name('home');


    
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');


  
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


    
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/struk/{id}', [TransaksiController::class, 'show'])->name('struk.show');


 
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/detail/{id}', [RiwayatController::class, 'detail']);


   
    Route::get('/open-drawer', [OpenDrawerController::class, 'index'])->name('open-drawer.index');
    Route::post('/open-drawer', [OpenDrawerController::class, 'store'])->name('open-drawer.store');


    
    Route::get('/close-drawer', [CloseDrawerController::class, 'index'])->name('close-drawer.index');
    Route::post('/close-drawer', [CloseDrawerController::class, 'store'])->name('close-drawer.store');

    Route::get('/transaksi/search-kode', [TransaksiController::class, 'searchKode'])->name('transaksi.searchKode');

    Route::get('/riwayat-drawer', [CloseDrawerController::class, 'history'])->name('drawer.history');
});
