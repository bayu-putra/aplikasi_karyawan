<?php

use App\Http\Controllers\BiodataController;
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

Route::get('/', [BiodataController::class, 'index'])->name('biodata.index');
Route::get('/add', [BiodataController::class, 'create'])->name('biodata.create');
Route::post('/add', [BiodataController::class, 'store'])->name('biodata.store');
Route::get('/{biodata}', [BiodataController::class, 'show'])->name('biodata.show');
Route::get('/edit/{biodata}', [BiodataController::class, 'edit'])->name('biodata.edit');
Route::put('/{biodata}', [BiodataController::class, 'update'])->name('biodata.update');
Route::delete('/{biodata}', [BiodataController::class, 'destroy'])->name('biodata.destroy');
