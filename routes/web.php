<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;

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

// GET = Mengambil Data Dari server , POST = mengirimkan data dari browser ke server //

// Authentikasi login / password //

// Menampilkan Form Login //
Route::get('login', [AuthController::class, 'login']);
// menangani proses autentikasi user //
Route::post('login', [AuthController::class, 'authenticate']);
// memproses permintaan logout dari user //
Route::get('logout', [AuthController::class, 'logout']);
// menampilkan form registrasi user baru //
Route::get('register', [AuthController::class,'register_form']);
// menangani proses registrasi user baru. //
Route::post('register', [AuthController::class,'register']);

// menampilkan halaman utama //
Route::get('/', [SiswaController::class, 'index']);

// Create //
// menampilkan halaman form untuk membuat data baru //
Route::get('/create', [SiswaController::class, 'create']);
// menangani proses penyimpanan data baru dari form . Ketika user men-submit form untuk menambahkan data baru //
Route::post('/', [SiswaController::class, 'store']);

// Delete //
//  menghapus data tertentu dengan menggunakan ID sebagai parameter //
Route::delete('/{id}', [SiswaController::class, 'destroy']);

// Edit //
// Untuk Mengedit data tertentu //
Route::get('/{id}/edit', [SiswaController::class, 'edit']);
// memperbarui data yang sudah ada pada server //
Route::patch('/{id}', [SiswaController::class, 'update']);

