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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

   Route::resource('products', App\Http\Controllers\ProductController::class);
   
   Route::get('/ipblacklist', [App\Http\Controllers\IpsController::class, 'index'])->name('ips');
   Route::post('/ipblacklist', [App\Http\Controllers\IpsController::class, 'store']);
   Route::delete('/ipblacklist/{id}', [App\Http\Controllers\IpsController::class, 'destroy']);
   
   Route::get('/requests', [App\Http\Controllers\RequestController::class, 'index'])->name('requests');

});

