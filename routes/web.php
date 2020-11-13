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

Route::namespace('BackEnd')->group(function () {
    Route::get('/', 'ControllerPrincipal@welcome')->name('welcome');
    Route::get('/noticias', 'ControllerPrincipal@noticias')->name('noticias');

    Route::get('/fotos', 'ControllerPrincipal@fotos')->name('fotos');
    Route::get('/album/{id}/{pg}', 'ControllerPrincipal@album')->name('album');
    Route::post('/album', 'ControllerPrincipal@albumBusca')->name('albums');
    Route::get('/albuns/{id}', 'ControllerPrincipal@albumList')->name('album.list');

    Route::get('/sobre', 'ControllerPrincipal@sobre')->name('sobre');
    Route::get('/contato', 'ControllerPrincipal@contato')->name('contato');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
