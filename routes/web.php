<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;

Route::get('/', function () {
    return view('index');
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['isAdmin'])->group(function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/product/create', [ProductController::class, 'create_view'])->name('create_view');
    Route::post('/product/create', [ProductController::class, 'add_product'])->name('add_product');
    Route::get('/product', [ProductController::class, 'all_product'])->name('all_product');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit_view'])->name('edit_view');
    Route::patch('/product/edit/{id}', [ProductController::class, 'edit_data'])->name('edit_data');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::post('/order/{order}/confrim', [OrderController::class, 'confrim_payment'])->name('confrim_payment');
    Route::get("/category/index", [CategoryController::class, 'index'])->name('category_view');
    Route::get("/category/create", [CategoryController::class, 'create'])->name('category_create');
    Route::post("/category/store", [CategoryController::class, 'store'])->name('category_store');
    Route::get("/category/{category}/edit", [CategoryController::class, 'edit'])->name('category_edit');
    Route::patch("/category/{category}/update", [CategoryController::class, 'update'])->name('category_update');
    Route::delete("/category/{category}/delete", [CategoryController::class, 'destroy'])->name('category_delete');

});

Route::middleware(['isMember'])->group(function(){
    Route::get('/home_view', [HomeController::class, 'home_view'])->name('home_view');
    Route::get('/home_view_detail/{id}', [HomeController::class, 'home_view_detail'])->name('home_view_detail');
    Route::get('/home_view_all_product', [HomeController::class, 'home_view_all_product'])->name('home_view_all_product');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile_view', [ProfileController::class, 'profile_view'])->name('profile_view');
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart',])->name('add_to_cart');
    Route::get('/cart', [CartController::class, 'show_cart',])->name('show_cart');
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    Route::post('/chekout', [OrderController::class, 'chekout'])->name('chekout');
    Route::get('/order', [OrderController::class, 'show_order'])->name('show_order');
    Route::get('/order/{order}', [OrderController::class, 'show_order_detail'])->name('show_order_detail');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');

});


