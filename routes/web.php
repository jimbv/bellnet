<?php
use App\Product;
use App\Category;
use App\Image;
use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;


Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');


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
  

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');

Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');

Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}',function($ruta){
    return redirect()->route($ruta)->with('cancelar','Acción cancelada');
})->name('cancelar');




Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');


  
Route::get('/localidades','DatosPersonales@getLocalidades'); 



Route::get('/test', function () {
    /*return  Role::create([
        'nombre'=>'Admin',
        'slug'=>'admin',
        'descripcion'=>'Administrador',
        'acceso-total'=>'si'
        ]);
    */
    //$user = User::find(1);
    //$user->roles()->dettach([1,3]); // Quitar 1 y 3
    //$user->roles()->attach([1,3]); // Agregar 1 y 3
    //$user->roles()->sync([1,3]); // Solo los roles 1 y 3 
    //return $user->roles;
/*
    return  Permission::create([
        'nombre'=>'Listar productos',
        'slug'=>'product.index',
        'descripcion'=>'Un usuario puede ver los productos',
        'acceso-total'=>'si'
        ]);
*/
    $role = Role::find(2);
    $role->permissions()->sync([1]); // Solo los roles 1 y 3 
    return $role->permissions;

});



