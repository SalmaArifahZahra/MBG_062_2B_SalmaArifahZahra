<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\GudangController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index_login'])->name('login');
Route::post('/login', [AuthController::class, 'action_login']);
Route::post('/logout', [AuthController::class, 'action_logout'])->name('logout');


Route::middleware(['auth', 'role:gudang'])->group(function () {

    Route::get('/admin/home', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.dashboard');

    Route::get('/gudang/bahan', [GudangController::class, 'index_bahan'])->name('gudang.bahan.index');
    Route::get('/gudang/bahan/tambah', [GudangController::class, 'index_tambah_bahan'])->name('gudang.bahan.tambah');
    Route::post('/gudang/bahan/tambah', [GudangController::class, 'action_tambah_bahan'])->name('gudang.bahan.simpan');
    Route::get('/gudang/bahan/{id}', [GudangController::class, 'action_detail_bahan'])->name('gudang.bahan.detail');
    Route::get('/gudang/bahan/{id}/edit', [GudangController::class, 'action_edit_bahan'])->name('gudang.bahan.edit');
    Route::post('/gudang/bahan/{id}/update', [GudangController::class, 'action_update_bahan'])->name('gudang.bahan.update');
    Route::delete('/gudang/bahan/{id}', [GudangController::class, 'action_delete_bahan'])->name('gudang.bahan.delete');
});

// Route::middleware(['auth', 'role:dapur'])->group(function () {
//     Route::get('/client/home', function () {
//         return view('client.home');
//     });
// });
