<?php

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

Route::get('/login',[App\Http\Controllers\AuthController::class, 'index'])->name('auth.index')->middleware('guest');
Route::post('/login',[App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware' => 'auth:user'], function (){
   Route::prefix('admin')->group(function (){
    Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/profile',[App\Http\Controllers\DashboardController::class, 'profile'])->name('dashboard.profile');


    Route::get('/kategori',[App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/tambah',[App\Http\Controllers\KategoriController::class, 'tambah'])->name('kategori.tambah');
    Route::get('/kategori/proses',[App\Http\Controllers\KategoriController::class, 'proses'])->name('kategori.proses');
    Route::get('/kategori/ubah{id}',[App\Http\Controllers\KategoriController::class, 'ubah'])->name('kategori.ubah');
    Route::get('/kategori/prosesUbah',[App\Http\Controllers\KategoriController::class, 'prosesUbah'])->name('kategori.prosesUbah');
    Route::get('/kategori/hapus{id}',[App\Http\Controllers\KategoriController::class, 'hapus'])->name('kategori.hapus');
   
    
   });
   Route::get('/logout',[App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
 
});