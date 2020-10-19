<?php
use App\Product;
use App\Category;
use App\Image;


 

// Mostrar resultados
Route::get('/resultados', function () {
    $img = App\Image::orderBy('id','desc')->get();
    return $img;
});




Route::get('/','Pagina\IndexController@index')->name('Inicio');
Route::get('/empresa','Pagina\IndexController@empresa')->name('Empresa');
Route::get('/contacto','Pagina\IndexController@contacto')->name('Contacto');
Route::post('/contacto','Pagina\IndexController@contactoenviado')->name('Contacto_enviado'); 
Route::get('/categoria/{slug}/','Pagina\IndexController@categoria');
Route::get('/producto/{slug}/','Pagina\IndexController@producto');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');

Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');

Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}',function($ruta){
    return redirect()->route($ruta)->with('cancelar','Acción cancelada');
})->name('cancelar');