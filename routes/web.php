<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UtilisateurController;
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

// Route pour les utilisateurs
Route::get('/utilisateurs-liste',[UtilisateurController::class,'liste'])->name('utilisateurs.liste');
Route::get('/utilisateurs-create',[UtilisateurController::class,'create'])->name('utilisateurs.create');
Route::post('/utilisateurs-store',[UtilisateurController::class,'store'])->name('utilisateurs.store');

// Route pour les roles
Route::get('/roles-liste',[RoleController::class,'liste'])->name('roles.liste');
Route::get('/roles-create',[RoleController::class,'create'])->name('roles.create');
Route::post('/roles-store',[RoleController::class,'store'])->name('roles.store');
Route::get('/roles-assign/{id}',[RoleController::class,'assignRole'])->name('roles.assignRole');
Route::post('/roles-assign/{id}',[RoleController::class,'storeAssignRole'])->name('roles.storeAssignRole');