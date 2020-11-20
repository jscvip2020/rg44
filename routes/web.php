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

Route::namespace('FrontEnd')->group(function () {
    Route::get('/', 'ControllerPrincipal@welcome')->name('welcome');
    Route::get('/noticias', 'ControllerPrincipal@noticias')->name('noticias');

    Route::get('/fotos', 'ControllerPrincipal@fotos')->name('fotos');
    Route::get('/album/{id}/{pg}', 'ControllerPrincipal@album')->name('album');
    Route::post('/album', 'ControllerPrincipal@albumBusca')->name('albums');
    Route::get('/albuns/{id}', 'ControllerPrincipal@albumList')->name('album.list');

    Route::get('/sobre', 'ControllerPrincipal@sobre')->name('sobre');
    Route::get('/contato', 'ControllerPrincipal@contato')->name('contato');
});

Route::namespace('BackEnd')->middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function (){
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('galerias','GaleryController',['except'=>['show']]);
    Route::get('galerias/{id}/{status}','GaleryController@status')->name('galerias.status');

    Route::resource('medias','MediaController',['except'=>['show']]);
    Route::get('medias/{id}/{status}','MediaController@status')->name('medias.status');


    Route::get('configs','ConfigController@index')->name('configs.index');
    Route::post('configs','ConfigController@config')->name('configs.env');
    Route::post('configs/logobranco','ConfigController@logobranco')->name('configs.logobranco');
    Route::post('configs/logopreto','ConfigController@logopreto')->name('configs.logopreto');
    Route::post('configs/fotoperfil','ConfigController@fotoperfil')->name('configs.fotoperfil');
    Route::post('configs/textoperfil','ConfigController@textoperfil')->name('configs.textoperfil');
    Route::post('configs/video','ConfigController@video')->name('configs.video');

    Route::get('usuarios', 'UserController@index')->name('users.index');
    Route::delete('usuarios/{id}', 'UserController@destroy')->name('users.destroy');
});
