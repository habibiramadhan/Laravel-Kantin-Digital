<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\{KategoriController, NamaPenjualController};

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');

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
    

    
    
});


Route::get('kasir/dashboard', 'HomeController@index')->middleware(['role:kasir', 'verified'])->name('home');
//Profile 
Route::prefix('profile')->name('profile.')->group(function(){
    Route::get('profile-edit', 'ProfileController@edit')->name('edit');
});
