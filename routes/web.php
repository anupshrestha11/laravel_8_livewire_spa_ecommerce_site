<?php

use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\EditProductForm;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Orders;
use App\Http\Livewire\ProductForm;
use App\Http\Livewire\Products;
use App\Http\Livewire\Register;
use App\Http\Livewire\Thankyou;
use Illuminate\Support\Facades\Auth;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/thankyou', Thankyou::class)->name('thankyou');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::group(['prefix' => 'dashboard', "middleware" => 'auth'], function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/products', Products::class)->name('dashboard.products');
    Route::get('/addproduct', ProductForm::class)->name('dashboard.showAddProduct');
    Route::get('/editproduct/{product}/edit', EditProductForm::class)->name('dashboard.showEditProduct');
    Route::get('/orders', Orders::class)->name('dashboard.orders');
});

Route::group(['prefix' => "/"], function () {
    Route::get("/", Home::class)->name('home');
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/checkout', Checkout::class)->name('checkout');
});

// Route::get("/session", function () {
//     dd(session()->get('cart'));
// });
