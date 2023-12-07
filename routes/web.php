<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\CripsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DecisionMatrixController;
use App\Http\Controllers\PerhitunganController;
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
})->name('welcome');


Route::resource('kriteria', KriteriaController::class);
Route::patch('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::resource('alternatif', AlternatifController::class);
Route::resource('input-nilai', DecisionMatrixController::class);
// Route::resource('/penilaian', Penilaian::class);
// Route::resource('perhitungan', PerhitunganController::class);
