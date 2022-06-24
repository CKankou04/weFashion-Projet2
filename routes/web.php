<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::resource('admin/product',ProductController::class)->middleware(['auth']);
Route::resource('admin/category',CategoryController::class)->middleware(['auth']);


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index']);

Route::get('product/{id}', [\App\Http\Controllers\FrontController::class, 'show'])->where(['id' => '[0-9]+']);

Route::get('solde', [\App\Http\Controllers\FrontController::class, 'showProductBySale']);

Route::get('category/{id}', [\App\Http\Controllers\FrontController::class, 'showProductByCategory'])->where(['id' => '[0-9]+']);
