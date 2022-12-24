<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\RestoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::group(['prefix' => 'admin','as' => 'admin.','namespace'=> 'App\Http\Controllers\Admin','middleware' => ['auth']],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::group(['prefix' => 'master','as' => 'master.','namespace'=> 'Master','middleware' => ['auth']],function(){
        Route::resource('daftar_makanan_minuman','DaftarMakananMinumanController');
        Route::group(['prefix' => 'resto','as' => 'resto.','middleware' => ['auth']],function(){
            Route::get('',[RestoController::class,'index'])->name('index');
            Route::put('update',[RestoController::class,'update'])->name('update');
        }); 
    }); 
}); 

require __DIR__.'/auth.php';
