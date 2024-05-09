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


//Timeline
Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline');


//Artefak
Route::get('/artefak', [App\Http\Controllers\ArtefakController::class, 'index'])->middleware(['auth', 'role:1,3'])->name('artefak');


//Jadwal
Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->middleware(['auth', 'role:1,3'])->name('jadwal');


//Bimbingan
Route::get('/bimbingan', [App\Http\Controllers\BimbinganController::class, 'index'])->middleware(['auth', 'role:2,3'])->name('bimbingan');