<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\ShopDetail;
use App\Livewire\ShopPage;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',function(){
        return view('dashboard');
    } )->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/shop',ShopPage::class)->name('shop');
    Route::get('/shopDetail',ShopDetail::class)->name('shop.detail');
    Route::get('/cart',Cart::class)->name('cart');
    Route::get('/checkout',Checkout::class)->name('checkout');
    
});

Route::get('/chat', Index::class)->name('chat.index');

require __DIR__.'/auth.php';
