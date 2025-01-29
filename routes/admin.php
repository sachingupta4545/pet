<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Controller;

Route::middleware('auth')->group(function () {
    Route::get('/category/add/page', function () {
        return view('admin.category.add_edit');
        })->name('category.add.page');
        Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/category/add', [CategoryController::class, 'add'])->name('category.add');
        
        
        Route::name('brand.')->group(function(){
            Route::get('/brand',[BrandController::class,'index'])->name('index');
            Route::get('/brand/add/page', function () {
                return view('admin.brand.add_edit');
            })->name('add.page');
            Route::post('/brand/add', [BrandController::class, 'add'])->name('add');
        });


        // Route::name('product.')->group(function(){
        //     Route::get('/product',[ProductController::class,'index'])->name('index');
        //     Route::resource('/product/add/{type?}', [ProductController::class, 'add'])->name('add');
        // });

        Route::resource('product',ProductController::class);
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});