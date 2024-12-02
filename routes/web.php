<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/create-product', function () {
//     return view('createProduct');
// });
Route::controller(ProductController::class)->group(function(){
Route::get('/', 'getHome')-> name('getHome');
Route::get('/create-product','getCreateProductPage')->name('getCreateProductPage');
Route::post('/create-product/create', 'createProduct')->name('createProduct');
Route::get('/edit-product/{productId}', 'getEditProductPage')->name('getEditProductPage');
Route::post('/edit-product/{productId}', 'editProduct')->name('editProduct');
Route::post('/delete-product/{productId}', 'deleteProduct')->name('deleteProduct');

});