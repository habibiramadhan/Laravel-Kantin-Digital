<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\BarangMasuk;

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

Route::get('/', function () {return view('welcome');})->name('welcome');

Auth::routes();

Route::prefix('kasir')->name('kasir.')->middleware('role:kasir')->group(function(){
    Route::get('/', 'Kasir\DashboardController@dashboard')->name('home');
    Route::get('/home', 'Kasir\DashboardController@dashboard')->name('home');
});
// ADMIN
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@dashboard')->name('home');
    Route::get('/home', 'Admin\DashboardController@dashboard')->name('home');

    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/index', 'Admin\KategoriController@index')->name('index');
        Route::get('/create', 'Admin\KategoriController@create')->name('create');
        Route::post('/store', 'Admin\KategoriController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\KategoriController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\KategoriController@update')->name('update');
        Route::delete('/destroy/{id}', 'Admin\KategoriController@destroy')->name('destroy');
    });
    Route::prefix('penjual')->name('penjual.')->group(function(){
        Route::get('/index', 'Admin\NamaPenjualController@index')->name('index');
        Route::get('/create', 'Admin\NamaPenjualController@create')->name('create');
        Route::post('/store', 'Admin\NamaPenjualController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\NamaPenjualController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\NamaPenjualController@update')->name('update');
        Route::delete('/destroy/{id}', 'Admin\NamaPenjualController@destroy')->name('destroy');
    });
    Route::prefix('menu-makanan')->name('menu-makanan.')->group(function(){
        Route::get('/index', 'Admin\MenuMakananController@index')->name('index');
        Route::get('/create', 'Admin\MenuMakananController@create')->name('create');
        Route::post('/store', 'Admin\MenuMakananController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\MenuMakananController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\MenuMakananController@update')->name('update');
        Route::delete('/destroy/{id}', 'Admin\MenuMakananController@destroy')->name('destroy');
    });
    Route::prefix('program-baru')->name('program-baru.')->group(function(){
        Route::get('/index', 'Admin\AddUserController@index')->name('index');
    });

    Route::prefix('penjualan-harian')->name('penjualan-harian.')->group(function(){
        Route::get('/index', 'Admin\PenjualanHarianController@index')->name('index');
        Route::get('/create', 'Admin\PenjualanHarianController@create')->name('create');
        Route::post('/store', 'Admin\PenjualanHarianController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\PenjualanHarianController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\PenjualanHarianController@update')->name('update');
        Route::delete('/destroy/{id}', 'Admin\PenjualanHarianController@destroy')->name('destroy');
    });

    Route::prefix('stok-barang')->name('stok-barang.')->group(function(){
        Route::get('/index', 'Admin\BarangController@index')->name('index');
        Route::post('/store', 'Admin\BarangController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\BarangController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\BarangController@update')->name('update');
        Route::delete('/destroy/{id}', 'Admin\BarangController@destroy')->name('destroy');
        Route::get('/barang-keluar/{id}','Admin\BarangController@show')->name('show');
        Route::put('/update-stok/{id}', 'Admin\BarangController@updateStok')->name('update-stok');
    });

    Route::prefix('barang-masuk')->name('barang-masuk.')->group(function(){
        Route::get('/index', 'Admin\BarangMasukController@index')->name('index');
        Route::post('/store', 'Admin\BarangMasukController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\BarangMasukController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\BarangMasukController@update')->name('update');
        Route::delete('/destroy/{id}', 'Admin\BarangMasukController@destroy')->name('destroy');
    });
});

//Profile 
Route::prefix('profile')->name('profile.')->group(function(){
    Route::get('profile-edit', 'ProfileController@edit')->name('edit');
});

Route::get('sad', function(){
    return BarangMasuk::find(1)->whereHas('barang' ,function($qr){
        return $qr->where('satuan_barang', 'kg');
    })->get();
});