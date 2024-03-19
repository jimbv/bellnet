<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

/* ADMIN */
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');

Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('create-product');
Route::post('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'save'])->name('products');
Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'list'])->name('products');

Route::get('/admin/categories/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->name('create-category');
Route::post('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'save'])->name('categories');
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'list'])->name('categories');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* WEB */
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::post('/contacto/enviar', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
