<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
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

Route::get('/',[HomeController::class,'welcome'])->name('welcome');

Route::get('/biens',[ControllersPropertyController::class,'index'])->name('all');
Route::get('/biens/{name}-{property}',[ControllersPropertyController::class,'show'])->name('show');
Route::post('/biens/{property}/contact',[ControllersPropertyController::class,'contact'])->name('contact');


Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'doLogin']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');


Route::prefix('/Admin/property')->middleware('auth')->controller(PropertyController::class)->name('property.')->group(function(){

    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{property}/edit', 'edit')->name('edit');
    Route::post('/{property}/edit', 'update')->name('update');
    Route::get('/{property}/delete', 'remove')->name('delete');

});


Route::prefix('/Admin/option')->middleware('auth')->controller(OptionController::class)->name('option.')->group(function(){

    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{option}/edit', 'edit')->name('edit');
    Route::post('/{option}/edit', 'update')->name('update');
    Route::get('/{option}/delete', 'remove')->name('delete');

});


