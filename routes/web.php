<?php

use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\ShopPage;
use App\Livewire\Chat\Index;
use App\Livewire\ShopDetail;
use App\Livewire\TestingToDo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',function(){
        return view('dashboard');
    } )->name('dashboard');
    Route::get('/dashboard', [ProfileController::class, 'dashboardShow'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/shop',ShopPage::class)->name('shop');
    Route::get('/shopDetail',ShopDetail::class)->name('shop.detail');
    Route::get('/cart',Cart::class)->name('cart');
    Route::get('/checkout',Checkout::class)->name('checkout');
    Route::get('/TestingToDo',TestingToDo::class)->name('TestingToDo');
    
});

Route::get('/chat', Index::class)->name('chat.index');

require __DIR__.'/auth.php';
