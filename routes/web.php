<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::middleware('auth')->group(function (){

    Route::resource('user', UserController::class)->only(['edit','update']);
    Route::resource('category', CategoryController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('product_photo/{id}',[ProductController::class,'deletePhoto'])->name('product_photo.delete');
    Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');


    Route::get('/product/specification/{id}',[\App\Http\Controllers\ProductSpecificationController::class,'delete']);
    Route::get('/product/photo/delete/{id}',[\App\Http\Controllers\ProductController::class,'deletePhoto']);
    Route::get('/product/publish/{id}',[\App\Http\Controllers\ProductController::class,'publish']);
});


Route::get('/dashboard', function () {
    return view('auth.auth_layout.main');
});

