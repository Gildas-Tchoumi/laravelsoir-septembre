<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'welcome'])->name('welcome');

// Route pour le dashboard
Route::get('/dashboard-dashboard',[HomeController::class,'index'])->name('dashboard');

// Route pour les categories
Route::get('/categories-liste',[CategoryController::class,'index'])->name('categories.liste');
Route::get('/categories-create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories-store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/categories-delete/{id}',[CategoryController::class,'destroy'])->name('categories.delete');

// Route pour les produits
Route::get('/products-liste',[ProductController::class,'index'])->name('products.liste');
Route::get('/products-create',[ProductController::class,'create'])->name('products.create');
Route::post('/products-store',[ProductController::class,'store'])->name('products.store');