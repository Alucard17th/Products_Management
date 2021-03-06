<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;



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

Route::get('/', [WelcomeController::class, 'index'])->name('dashboard');

Route::get('/productslist', [ProductController::class, 'index'])->name('products.index');
Route::post('/addproduct', [ProductController::class, 'store'])->name('products.store');

Route::get('/categorieslist', [CategorieController::class, 'index'])->name('categories.index');
Route::post('/addcategory', [CategorieController::class, 'store'])->name('categories.store');




// Route::middleware('auth:sanctum')->group(function() {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });





