<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Dashboard (Customer/Vendor)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Public Routes (Guest Allowed)
|--------------------------------------------------------------------------
*/

// Home / Product listing
Route::get('/', [ProductController::class, 'index'])->name('home');

// Auto-suggest search
Route::get('/product-suggest', [ProductController::class, 'suggest'])
    ->name('product.suggest');

// Cart
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/clear-cart', function () {
    session()->forget('cart');
    return 'Cart cleared';
});

/*
|--------------------------------------------------------------------------
| Checkout (Auth Required)
|--------------------------------------------------------------------------
*/
Route::get('/checkout', [CheckoutController::class, 'checkout'])
    ->middleware('auth')
    ->name('checkout');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Admin Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {

            $totalOrders = Order::count();
            $totalCustomers = User::where('role', 'customer')->count();
            $totalVendors = User::where('role', 'vendor')->count();

            return view('admin.dashboard', compact('totalOrders', 'totalCustomers', 'totalVendors'));
        })->name('dashboard');

        Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])
            ->name('orders.show');

        Route::resource('products', App\Http\Controllers\Admin\ProductController::class)
            ->except(['show'])
            ->names('products');
    });



require __DIR__ . '/auth.php';
