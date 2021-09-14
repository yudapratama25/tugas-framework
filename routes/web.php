<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [MahasiswaController::class, 'create'])->name('create');
    Route::post('/dashboard/create', [MahasiswaController::class, 'store'])->name('store');
    Route::get('/dashboard/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('edit');
    Route::patch('/dashboard/edit/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update');
    Route::delete('/dashboard/delete/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('delete');
});