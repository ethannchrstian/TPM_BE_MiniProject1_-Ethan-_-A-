<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\IsLogin;
use App\Http\Middleware\CheckIfAuthenticated;

Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'getHome')->name('getHome')->middleware('auth');  
    Route::get('/create-product', 'getCreateProductPage')->name('getCreateProductPage')->middleware(IsLogin::class);  
    Route::post('/create-product/create', 'createProduct')->name('createProduct');
    Route::get('/edit-product/{productId}', 'getEditProductPage')->name('getEditProductPage');
    Route::post('/edit-product/{productId}', 'editProduct')->name('editProduct');
    Route::post('/delete-product/{productId}', 'deleteProduct')->name('deleteProduct');
    Route::get('/products/api', 'productsAPI')->name('productsAPI');
});


Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/register', 'getRegister')->name('getRegister');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'getLogin')->name('getLogin');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
