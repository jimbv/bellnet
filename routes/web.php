<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::redirect('/register', '/'); // Deshabilitar registro

Route::middleware('auth')->group(function () {
/* ADMIN */
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');

Route::get('/admin/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('create-product');
Route::post('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'save'])->name('products');
Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'list'])->name('products');
Route::get('/admin/products/{id}',  [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('productos.delete');
Route::get('/admin/products/{id}/edit',  [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->name('productos.edit');
Route::put('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('products.update');

Route::get('/admin/categories/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->name('create-category');
Route::post('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'save'])->name('categories');
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'list'])->name('categories');
Route::get('/admin/categories/{id}',  [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('categories.delete');
Route::get('/admin/categories/{id}/edit',  [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('categories.update');

Route::get('/admin/work_images/create', [App\Http\Controllers\Admin\WorkImagesController::class, 'create'])->name('create-category');
Route::post('/admin/work_images', [App\Http\Controllers\Admin\WorkImagesController::class, 'save'])->name('work_images');
Route::get('/admin/work_images', [App\Http\Controllers\Admin\WorkImagesController::class, 'list'])->name('work_images');
Route::get('/admin/work_images/{id}',  [App\Http\Controllers\Admin\WorkImagesController::class, 'delete'])->name('work_images.delete');
Route::get('/admin/work_images/{id}/edit',  [App\Http\Controllers\Admin\WorkImagesController::class, 'edit'])->name('work_images.edit');
Route::put('/admin/work_images', [App\Http\Controllers\Admin\WorkImagesController::class, 'update'])->name('work_images.update');

Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'list'])->name('posts');
Route::get('/admin/posts/create', [App\Http\Controllers\Admin\PostsController::class, 'create'])->name('create-post');
Route::post('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'save'])->name('posts');
Route::get('/admin/posts/{id}',  [App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('posts.delete');
Route::get('/admin/posts/{id}/edit',  [App\Http\Controllers\Admin\PostsController::class, 'edit'])->name('posts.edit');
Route::put('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('posts.update');

Route::get('/admin/configuration', [App\Http\Controllers\Admin\ConfigurationsController::class, 'index'])->name('admin.configuration.index');
Route::put('/admin/configuration', [App\Http\Controllers\Admin\ConfigurationsController::class, 'update'])->name('admin.configuration.update');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* WEB */
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/catalogo', [App\Http\Controllers\IndexController::class, 'catalogo'])->name('catalogo');
Route::get('/devolucion', [App\Http\Controllers\IndexController::class, 'devolucion'])->name('devolucion');
Route::get('/lista', [App\Http\Controllers\IndexController::class, 'lista'])->name('lista');
Route::get('/empresa', [App\Http\Controllers\IndexController::class, 'empresa'])->name('index');
Route::get('/glosario', [App\Http\Controllers\IndexController::class, 'glosario'])->name('index');
Route::get('/productos', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/noticias', [App\Http\Controllers\PostsController::class, 'index'])->name('noticias.index');

Route::post('/contacto/enviar', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::get('/send-mail', [App\Http\Controllers\SendMailController::class, 'contact']);

Route::get('/categorias/{slug}',  [App\Http\Controllers\ProductsController::class, 'mostrarCategoria'])->name('productos.categoria');
Route::get('/productos/{slug}',  [App\Http\Controllers\ProductsController::class, 'mostrarProducto'])->name('productos.producto');
Route::get('/noticias/{slug}',  [App\Http\Controllers\PostsController::class, 'mostrarPost'])->name('noticias.noticia');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
