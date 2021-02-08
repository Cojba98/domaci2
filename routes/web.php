<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProducersController;
use App\Http\Controllers\CategoriesController;
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

Route::get('pozdrav', function(){
    $ime = "novak";
    return view('product', compact('ime'));
});

Route::get('/addProduct', [ProductController::class, 'getProducts']);
Route::post('/addProduct', [ProductController::class, 'addProduct']);

Route::get('products', [ProductController::class, 'get']);
Route::post('products/{id}', [ProductController::class, 'deleteProduct']);
Route::get('products/{id}', [ProductController::class, 'getProduct']);


Route::get('/producers', [ProducersController::class, 'getProducers']);

Route::get('/addProducer', [ProducersController::class, 'openAddProducerForm']);
Route::post('/addProducer', [ProducersController::class, 'addProducer']);

Route::get('/categories', [CategoriesController::class, 'getCategories']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
