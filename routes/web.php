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
// route menant au backend
Route::resource('admin/product',ProductController::class)->middleware(['auth']);
Route::resource('admin/category',CategoryController::class)->middleware(['auth']);


Auth::routes();

// route affichant la page d'accueil
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route affichant la page d'accueil
Route::get('/', [\App\Http\Controllers\FrontController::class, 'index']);
// route affichant la page d'un produit en détail
Route::get('product/{id}', [\App\Http\Controllers\FrontController::class, 'show'])->where(['id' => '[0-9]+']);
// route affichant uniquement les produits en solde
Route::get('solde', [\App\Http\Controllers\FrontController::class, 'showProductBySale']);
// route affichant les produits selon la catégorie souhaité
Route::get('category/{id}', [\App\Http\Controllers\FrontController::class, 'showProductByCategory'])->where(['id' => '[0-9]+']);
