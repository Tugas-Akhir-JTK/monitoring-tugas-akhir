<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Kota
Route::get('/kota', [App\Http\Controllers\KotaController::class, 'index'])->middleware(['auth', 'role:1,2'])->name('kota');
Route::get('/kota/detail/{id}', [App\Http\Controllers\KotaController::class, 'detail'])->middleware(['auth', 'role:1,2'])->name('kota.detail');
Route::get('/kota/create', [App\Http\Controllers\KotaController::class, 'create'])->middleware(['auth', 'role:1,2'])->name('kota.create'); //menambahkan data
Route::get('/kota/{id}', [App\Http\Controllers\KotaController::class, 'detail'])->middleware(['auth', 'role:1,2'])->name('kota.detail');
Route::post('/kota/store', [App\Http\Controllers\KotaController::class, 'store'])->middleware(['auth', 'role:1,2'])->name('kota.store');
Route::get('/kota/edit/{id}', [App\Http\Controllers\KotaController::class, 'edit'])->middleware(['auth', 'role:1,2'])->name('kota.edit');
Route::put('/kota/update', [App\Http\Controllers\KotaController::class, 'update'])->middleware(['auth', 'role:1,2'])->name('kota.update');
Route::post('/kota/search', [App\Http\Controllers\KotaController::class, 'search'])->middleware(['auth', 'role:1,2'])->name('kota.search');
Route::get('/kota/{id}', [App\Http\Controllers\KotaController::class, 'destroy'])->middleware(['auth', 'role:1,2'])->name('kota.destroy');


//Timeline
Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline');


//Artefak
Route::get('/artefak', [App\Http\Controllers\ArtefakController::class, 'index'])->middleware(['auth', 'role:1'])->name('artefak');
Route::get('/artefak/detail/{id}', [App\Http\Controllers\ArtefakController::class, 'detail'])->middleware(['auth', 'role:1'])->name('artefak.detail');
Route::get('/artefak/create', [App\Http\Controllers\ArtefakController::class, 'create'])->middleware(['auth', 'role:1'])->name('artefak.create'); //menambahkan data
Route::get('/artefak/{id}', [App\Http\Controllers\ArtefakController::class, 'detail'])->middleware(['auth', 'role:1'])->name('artefak.detail');
Route::post('/artefak/store', [App\Http\Controllers\ArtefakController::class, 'store'])->middleware(['auth', 'role:1'])->name('artefak.store');
Route::get('/artefak/edit/{id}', [App\Http\Controllers\ArtefakController::class, 'edit'])->middleware(['auth', 'role:1'])->name('artefak.edit');
Route::put('/artefak/update', [App\Http\Controllers\ArtefakController::class, 'update'])->middleware(['auth', 'role:1'])->name('artefak.update');
Route::post('/artefak/search', [App\Http\Controllers\ArtefakController::class, 'search'])->middleware(['auth', 'role:1'])->name('artefak.search');
Route::delete('/artefak/{id}', [App\Http\Controllers\ArtefakController::class, 'destroy'])->middleware(['auth', 'role:1'])->name('artefak.destroy');

//Jadwal
Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->middleware(['auth', 'role:1,3'])->name('jadwal');


//Bimbingan
Route::get('/bimbingan', [App\Http\Controllers\BimbinganController::class, 'index'])->middleware(['auth', 'role:2,3'])->name('bimbingan');