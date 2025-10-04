<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [AuthController::class, 'index_login']);
Route::get('/login', [AuthController::class, 'index_login'])->name('login');
Route::post('/login', [AuthController::class, 'action_login']);
Route::middleware(['auth'])->post('/logout', [AuthController::class, 'action_logout'])->name('logout');


Route::middleware(['auth', 'role:gudang'])->group(function () {
    Route::controller(AdminController::class)->group(function () {

        Route::get('/admin/dashboard', 'index');
        Route::get('/admin/home', 'index');

        Route::get('/admin/bahan', 'index_bahan');
        Route::get('/admin/bahan/tambah', 'index_tambah_bahan');
        Route::post('/admin/bahan/tambah', 'action_tambah_bahan');

        Route::get('/admin/bahan/{id}/edit', 'action_edit_bahan');
        Route::post('/admin/bahan/{id}/update', 'action_update_bahan');
        Route::delete('/admin/bahan/{id}', 'action_delete_bahan');

        Route::get('/admin/permintaan', 'index_permintaan');
        Route::get('/admin/permintaan/{id}', 'action_detail_permintaan');
        Route::post('/admin/permintaan/{id}/proses', 'action_proses_permintaan');
    });
});
