<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// User Interface

Route::get('/redirect',[HomeController::class, 'redirect'])->middleware('auth','verified')->name('redirect');


// AdminConroller Interface 
Route::get('/add-category',[AdminController::class, 'add_category'])->name('add-category');
Route::post('/add_category_item',[AdminController::class, 'add_category_item'])->name('add_category_item');
Route::get('/show_category_item',[AdminController::class, 'show_category_item'])->name('show_category_item');
Route::get('/delete_category/{id}',[AdminController::class, 'delete_category'])->name('delete_category');
Route::get('/add_quantity',[AdminController::class, 'add_quantity'])->name('add_quantity');
Route::post('/update_quantity/{id}',[AdminController::class, 'update_quantity'])->name('update_quantity');


// Product Class View

Route::resource('products', ProductController::class);
Route::get('/add-product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/create-product', [ProductController::class, 'create_product'])->name('create_product');
Route::get('/delete_product/{id}',[ProductController::class, 'delete_product'])->name('delete_product');
Route::get('/update_product/{id}',[ProductController::class, 'update_product'])->name('update_product');


// Customer Class View
Route::resource('customers',CustomerController::class);
Route::get('/customer-detail/{id}', [CustomerController::class, 'customer_detail'])->name('customer-detail');



// Admin Orders 
Route::get('/create-order', [AdminController::class, 'create_orders'])->name('create_orders');
Route::post('/orders-code', [AdminController::class, 'addItem'])->name('addItem');

// Cart Class View
Route::post('/add-to-cart/{id}',[CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/show_cart',[CartController::class, 'show_cart'])->name('show_cart');
Route::get('/remove_cart/{id}',[AdminController::class, 'remove_cart'])->name('remove_cart');
Route::post('/update_cart', [CartController::class, 'updateCart'])->name('update_cart');

// Orders ClassView
Route::get('/cash_order',[OrdersController::class, 'cash_order'])->name('cash_order');
Route::get('/momo_order',[OrdersController::class, 'momo_order'])->name('momo_order');
Route::get('/orders',[OrdersController::class, 'orders'])->name('orders');
Route::get('/deliver/{id}',[OrdersController::class, 'deliver'])->name('deliver');
Route::get('/invoice/{id}',[OrdersController::class, 'invoice'])->name('invoice');
Route::get('/send_mail/{id}',[OrdersController::class, 'send_mail'])->name('send_mail');
Route::post('/send_user_mail/{id}',[OrdersController::class, 'send_user_mail'])->name('send_user_mail');

// Search In Admin View
Route::post('/search_order',[OrdersController::class, 'search_order'])->name('search_order');



