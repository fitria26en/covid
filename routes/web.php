<?php

use App\Http\Controllers\DashboardControler;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\http\Controllers\KasusController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test',function(){
    return view('layouts.master');
});

/*Route::get('admin',function(){
    return view('admin.index');
});*/
    Route::group(['prefix'=>'admin'],function(){
Route::get('/',[DashboardControler::class,'index'])->name('admin');
Route::resource('provinsi',ProvinsiController::class);
Route::resource('kota',KotaController::class);
Route::resource('kecamatan',KecamatanController::class);
Route::resource('kelurahan',KelurahanController::class);
Route::resource('rw',RwController::class);
Route::resource('kasus',KasusController::class);

});