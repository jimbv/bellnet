<?php
use App\Product;
use App\Category;
use App\Image;



// Para hacer las pruebas con las imagenes
Route::get('/prueba', function () {

    //17 CARGA PREVIA DE MULTIPLES RELACIONES DE UN PRODUCTO ESPECIFICO (EAGER LOADING) 

    $producto = App\Product::with('images','category')->orderBy('id','desc')->get();
    return $producto;
     
});

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

Route::get('/ssss', function () {
/*
$prod= Product::findOrFail(2);

$prod->slug = 'producto-3';

$prod->save();

return $prod;*

/*
$prod = new Product();
$prod->nombre = 'Producto 3';
$prod->slug = 'Producto 3';
$prod->category_id = 1;
$prod->descripcion_corta = 'Producto ';
$prod->descripcion_larga = 'Producto ';
$prod->especificaciones = 'Producto ';
$prod->datos_de_interes = 'Producto ';
$prod->estado = 'Nuevo';
$prod->activo = 'Si';
$prod->slider_principal = 'No';
$prod->save();
return $prod;

*/ 
 
//return view('tienda.index');

    /*
    $cat = Category::find(1)->products;
    return $cat;*/
});

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