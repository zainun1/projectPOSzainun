<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard', ["title" => "Dashboard"]);
});


/*
|--------------------------------------------------------------------------
| KATEGORI
|--------------------------------------------------------------------------
*/

Route::resource('kategori', CategoryController::class)
    ->except(['show', 'destroy', 'create']);

/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/pelanggan', [CustomerController::class, 'index'])
    ->name('pelanggan.index'); 

Route::get('/pelanggan/create', [CustomerController::class, 'create'])
    ->name('pelanggan.create'); 

Route::post('/pelanggan/store', [CustomerController::class, 'store'])
    ->name('pelanggan.store'); 
    Route::get('/pelanggan/{pelanggan}', [CustomerController::class, 'show'])
    ->name('pelanggan.show'); 

Route::get('/pelanggan/{pelanggan}/edit', [CustomerController::class, 'edit'])
    ->name('pelanggan.edit'); 

Route::put('/pelanggan/{pelanggan}', [CustomerController::class, 'update'])
    ->name('pelanggan.update'); 
    Route::resource('produk', ProductController::class); 
    Route::resource('pengguna', UserController::class)->except('destroy', 'create', 'show', 'update', 'edit'); 
    Route::get('login', [LoginController::class, 'loginView']);
    Route::post('login', [LoginController::class, 'authenticate']);