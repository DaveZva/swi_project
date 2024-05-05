<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('baseWeb.home');
})->name('home');

Route::get('/login', function () {
    return view('baseWeb.login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/registration', function () {
    return view('baseWeb.registration');
})->name('registration');

Route::post('/registration', [UserController::class, 'registration']);


// Products
// Route pro získání detailu produktu
//Route::get('/product/{id}', [EshopController::class, 'getProduct'])->name('product.detail');

// Route pro zobrazení všech produktů
Route::get('/products', [ProductController::class, 'allProducts'])->name('product.all');

// Route pro vytvoření nového produktu
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

//Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');

// Route pro ukládání nově vytvořeného produktu
Route::post('/product', [ProductController::class, 'store'])->name('product.store');


// Categories
// Route pro zobrazení všech kategorií
Route::get('/categories', [CategoryController::class, 'allCategories'])->name('category.all');

// Route pro vytvoření nové kategorie
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

// Route pro ukládání nově vytvořené kategorie
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');


