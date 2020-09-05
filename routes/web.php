<?php

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

Route::group(['namespace' => 'Johhan'], function (){


	Route::get('Menu','MenuController@page')->name('menu_principal.home');
	Route::get('Asiento','AsientoController@index')->name('page.inicio');
	Route::get('Asiento/create','AsientoController@create')->name('page.create.accounting');
	Route::resource('crear_asiento','AsientoController');

	Route::get('Asiento/pdf','AsientoController@pdf_asiento')->name('page.pdf-asiento');

});
