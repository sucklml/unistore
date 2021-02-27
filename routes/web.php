<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function (){
    Route::prefix('dashboard')->group(function(){
        Route::get('home','HomeController@dashboard')->name('dashboard')
            ->middleware('permission:access_dashboard');
        // TODO: Rutas modulo Tienda
        //Index:muestra el listado de tiendas
        Route::get('tiendas','ShopController@index')->name('shop.index')
            ->middleware('permission:create_store');
        // Create: muestra el formulario de creacion
        Route::get('tienda/crear','ShopController@create')->name('shop.create')
            ->middleware('permission:create_store');
        // Store: guarda en la bd la tienda
        Route::post('shop/store','ShopController@store')->name('shop.store')
            ->middleware('permission:save_store');



        // Edit: mostrar formulario de actualizacion
        Route::get('tienda/actualizar/{id}','ShopController@edit')->name('shop.edit')
            ->middleware('permission:edit_store');
        // Edit: guarda la nueva informacion de la tienda
        Route::post('shop/update','ShopController@update')->name('shop.update')
            ->middleware('permission:update_store');
        //Destroy: eliminar la la tienda
        Route::post('shop/destroy','ShopController@destroy')->name('shop.destroy')
            ->middleware('permission:destroy_store');


        //Trashed: devuelve las tiendas eliminadas
        Route::get('tienda/eliminar','ShopController@trashed')->name('shop.trashed')
            ->middleware('permission:restore_store');
        //Restore: Restaurar una tienda
        Route::post('shop/restore','ShopController@restore')->name('shop.restore')
            ->middleware('permission:restore_store');


    });
});
