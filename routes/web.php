<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{KategoriController, NamaPenjualController};

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function(){

    // KATEGORI
    Route::get('/category', [KategoriController::class, 'index'])->name('category.index');
    Route::get('/category-create', [KategoriController::class, 'create'])->name('category.create');
    Route::post('/category-store', [KategoriController::class, 'store'])->name('category.store');
    Route::get('/category-edit/{id}', [KategoriController::class, 'edit'])->name('category.edit');
    Route::put('/category-update/{id}', [KategoriController::class, 'update'])->name('category.update');
    Route::delete('/category-destroy/{id}', [KategoriController::class, 'destroy'])->name('category.destroy');

    // KATEGORI
    Route::get('/data-penjual', [NamaPenjualController::class, 'index'])->name('penjual.index');
    Route::get('/data-penjual-create', [NamaPenjualController::class, 'create'])->name('penjual.create');
    Route::post('/data-penjual-store', [NamaPenjualController::class, 'store'])->name('penjual.store');
    Route::get('/data-penjual-edit/{id}', [NamaPenjualController::class, 'edit'])->name('penjual.edit');
    Route::put('/data-penjual-update/{id}', [NamaPenjualController::class, 'update'])->name('penjual.update');
    Route::delete('/data-penjual-destroy/{id}', [NamaPenjualController::class, 'destroy'])->name('penjual.destroy');

});
