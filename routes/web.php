<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TblUserController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratController;
use App\Http\Middleware\OnlyAdmin;

Route::get('/', function () {
    return view('dashboard.index');
});


Route::prefix('/dashboard')->group(function(){
    Route::get('/',[DashboardController::class, 'index']);
    Route::get('/manage-pengguna',[TblUserController::class, 'index']);
    Route::get('/manage-pengguna/tambah',[TblUserController::class, 'tambah']);
    Route::post('/manage-pengguna/simpan',[TblUserController::class, 'simpan']);
    Route::get('/pengguna/edit/{id}',[TblUserController::class, 'edit']);
    Route::get('/jenissurat',[JenisSuratController::class, 'index']);
    Route::get('/jenissurat/tambah',[JenisSuratController::class, 'tambah']);
    Route::post('/jenissurat/simpan',[JenisSuratController::class, 'simpan']);
    Route::get('/jenissurat/edit/{id}',[JenisSuratController::class, 'edit']);
    Route::post('/jenissurat/hapus',[JenisSuratController::class, 'hapus']);
    Route::get('/surat',[SuratController::class, 'index']);
    Route::get('/surat/tambah',[SuratController::class, 'tambah']);
    Route::post('/surat/simpan',[SuratController::class, 'simpan']);
});

Route::prefix('/auth')->group(function(){
    Route::get('/',[AuthController::class, 'index']);
});