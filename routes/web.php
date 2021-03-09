<?php

use Illuminate\Support\Facades\Route;

Route::namespace('FrontEnd')->group(function () {
    Route::get('/', 'ControllerPrincipal@welcome')->name('welcome');

    Route::get('/fotos', 'ControllerPrincipal@fotos')->name('fotos');
    Route::get('/album/{id}/{pg}', 'ControllerPrincipal@album')->name('album');
    Route::post('/album', 'ControllerPrincipal@albumBusca')->name('albums');
    Route::get('/albuns/{id}', 'ControllerPrincipal@albumList')->name('album.list');

    Route::get('/eventos', 'ControllerPrincipal@eventos')->name('eventos');
    Route::get('/parceiros', 'ControllerPrincipal@parceiros')->name('parceiros');
    Route::get('/sobre', 'ControllerPrincipal@sobre')->name('sobre');
    Route::get('/contato', 'ControllerPrincipal@contato')->name('contato');
    Route::post('/contato', 'ControllerPrincipal@emailContato')->name('email.contato');

    Route::get('/noticias', 'ControllerNoticia@index')->name('noticias.all');
    Route::get('/noticia/{id}/{slug}', 'ControllerNoticia@single')->name('noticia.single');
    Route::any('/noticias/all', 'ControllerNoticia@all')->name('noticias.full');

    Route::get('pag/{id}/{slug}', 'ControllerPagina@pagina')->name('pag.pagina');
    Route::get('pags/{id}/{slug}', 'ControllerPagina@fullpagina')->name('pag.fullpagina');

    Route::get('/ensaios', 'ControllerPrincipal@ensaios')->name('ensaios');
    Route::get('/ensaio/{id}/{nome}', 'ControllerPrincipal@ensaio')->name('ensaio');
});

//BackEnd

Route::namespace('BackEnd')->middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('galerias', 'GaleryController', ['except' => ['show']]);
    Route::get('galerias/{id}/{status}', 'GaleryController@status')->name('galerias.status');

    Route::resource('medias', 'MediaController', ['except' => ['show']]);
    Route::get('medias/{id}/{status}', 'MediaController@status')->name('medias.status');


    Route::get('configs', 'ConfigController@index')->name('configs.index');
    Route::post('configs', 'ConfigController@config')->name('configs.env');
    Route::post('configs/logobranco', 'ConfigController@logobranco')->name('configs.logobranco');
    Route::post('configs/logopreto', 'ConfigController@logopreto')->name('configs.logopreto');
    Route::post('configs/fotoperfil', 'ConfigController@fotoperfil')->name('configs.fotoperfil');
    Route::post('configs/textoperfil', 'ConfigController@textoperfil')->name('configs.textoperfil');
    Route::post('configs/video', 'ConfigController@video')->name('configs.video');

    Route::get('usuarios', 'UserController@index')->name('users.index');
    Route::delete('usuarios/{id}', 'UserController@destroy')->name('users.destroy');

    Route::resource('eventos', 'EventoController');
    Route::get('eventos/{id}/{status}', 'EventoController@status')->name('eventos.status');

    Route::resource('parceiros', 'ParceiroController');
    Route::get('parceiros/{id}/{status}', 'ParceiroController@status')->name('parceiros.status');

    Route::resource('noticias', 'NoticiaController');
    Route::get('noticias/{id}/{status}', 'NoticiaController@status')->name('noticias.status');
    Route::get('noticia/{id}/{fixo}', 'NoticiaController@fixo')->name('noticia.fixo');

//    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
    Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
    Route::post('ckeditor/upload/{id}', 'CKEditorController@uploadEdit')->name('ckeditor.uploadEdit');


    Route::post('ckeditor/uploaditem', 'CKEditorController@itemupload')->name('ckeditor.itemupload');
    Route::post('ckeditor/uploaditem/{id}', 'CKEditorController@itemuploadEdit')->name('ckeditor.uploaditemEdit');

    Route::resource('paginas', 'PaginaController', ['except' => ['show']]);
    Route::get('paginas/{id}/{status}', 'PaginaController@status')->name('paginas.status');

    Route::resource('itempaginas', 'ItemPaginaController', ['except' => ['show']]);
    Route::get('itempaginas/{id}/{status}', 'ItemPaginaController@status')->name('itempaginas.status');

    Route::resource('ensaios', 'EnsaioController', ['except' => ['show']]);
    Route::get('ensaios/{id}/{status}', 'EnsaioController@status')->name('ensaios.status');

});
