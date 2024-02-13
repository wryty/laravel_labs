<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ArticleController;
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


Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/catalog/show', [CatalogController::class, 'show'])->name('show-product');


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show')->middleware('views');
Route::post('/articles/{article}/approve', [ArticleController::class, 'approve'])->name('articles.approve');
Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');