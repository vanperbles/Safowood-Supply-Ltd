<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;




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

Route::get('/redirect',[HomeController::class, 'redirect'])->name('redirect');


// AdminConroller Interface 
Route::get('/add-category',[AdminController::class, 'add_category'])->name('add-category');
Route::post('/add_category_item',[AdminController::class, 'add_category_item'])->name('add_category_item');
Route::get('/show_category_item',[AdminController::class, 'show_category_item'])->name('show_category_item');
Route::get('/delete_category/{id}',[AdminController::class, 'delete_category'])->name('delete_category');

// Product Class View

Route::resource('products', ProductController::class);
Route::get('/add-product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/create-product', [ProductController::class, 'create_product'])->name('create_product');
Route::get('/delete_product/{id}',[ProductController::class, 'delete_product'])->name('delete_product');
Route::get('/update_product/{id}',[ProductController::class, 'update_product'])->name('update_product');


// Customer Class View
Route::resource('customers',CustomerController::class);

// Admin Orders 
Route::get('/create-order', [AdminController::class, 'create_orders'])->name('create_orders');
Route::post('/orders-code', [AdminController::class, 'addItem'])->name('addItem');