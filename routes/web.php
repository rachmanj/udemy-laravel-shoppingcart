<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', [AdminController::class, 'admin']);

//Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/del_category/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/del_product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/activate_product/{id}', [ProductController::class, 'activate'])->name('products.activate');
Route::get('/unactivate_product/{id}', [ProductController::class, 'unactivate'])->name('products.unactivate');

// //Sliders
Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
Route::get('/sliders/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
Route::get('/del_slider/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
Route::get('/activate_sliders/{id}', [SliderController::class, 'activate'])->name('sliders.activate');
Route::get('/deactivate_sliders/{id}', [SliderController::class, 'deactivate'])->name('sliders.deactivate');

// // Orders
// Route::get('/orders', [OrderController::class, 'orders']);


Route::get('/', [ClientController::class, 'home'])->name('client.home');
Route::get('/shop', [ClientController::class, 'shop']);
Route::get('/cart', [ClientController::class, 'cart']);
Route::get('/checkout', [ClientController::class, 'checkout']);
Route::get('/logins', [ClientController::class, 'login']);
Route::get('/signup', [ClientController::class, 'signup']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
