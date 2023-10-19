<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PanierController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('product', ProductController::class)->middleware('auth');

Route::controller(ProductController::class)->group(function () {
    Route::get('category/{slug}/products', 'index')->name('products.category');
});

Route::get('products/category/{slug}', [ProductController::class, 'index'])->name('product.categories');

Route::get('/categories/{slug}', [ProductController::class, 'category'])->name('category.index');




Route::resource('panier', PanierController::class)->middleware('auth');
Route::get('/panier', 'App\Http\Controllers\PanierController@index')->name('panier.index');
Route::get('/panier/ajouter/{product_id}', 'App\Http\Controllers\PanierController@ajouter')->name('panier.ajouter');
Route::get('/panier/modifier/{product_id}', 'App\Http\Controllers\PanierController@modifier')->name('panier.modifier');
Route::post('/panier/valider', 'PanierController@valider')->name('panier.valider');
Route::get('/panier/supprimer/{product_id}', 'App\Http\Controllers\PanierController@supprimer')->name('panier.supprimer');


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

require __DIR__.'/auth.php';

