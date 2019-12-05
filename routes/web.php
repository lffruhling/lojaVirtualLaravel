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

Route::get('/logout', 'HomeController@getLogout')->name('logout');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'Admin\PainelController@index')->name('admin');

    Route::get('/categorias', 'Admin\CategoriasController@index')->name('admin.categorias.index');
    Route::post('/categorias/listagem', 'Admin\CategoriasController@listagem')->name('admin.categorias.listagem');
    Route::get('/categorias/registro', 'Admin\CategoriasController@registro')->name('admin.categorias.registro');
    Route::get('/categorias/{id}', 'Admin\CategoriasController@edicao')->name('admin.categorias.edicao')->where(['id' => '[0-9]+']);
    Route::post('/categorias', 'Admin\CategoriasController@save')->name('admin.categorias.post');

    Route::get('/tipo_pagamentos', 'Admin\TipoPagamentosController@index')->name('admin.tipo_pagamentos.index');
    Route::post('/tipo_pagamentos/listagem', 'Admin\TipoPagamentosController@listagem')->name('admin.tipo_pagamentos.listagem');
    Route::get('/tipo_pagamentos/registro', 'Admin\TipoPagamentosController@registro')->name('admin.tipo_pagamentos.registro');
    Route::get('/tipo_pagamentos/{id}', 'Admin\TipoPagamentosController@edicao')->name('admin.tipo_pagamentos.edicao')->where(['id' => '[0-9]+']);
    Route::post('/tipo_pagamentos', 'Admin\TipoPagamentosController@save')->name('admin.tipo_pagamentos.post');

    Route::get('/produtos', 'Admin\ProdutosController@index')->name('admin.produtos.index');
    Route::post('/produtos/listagem', 'Admin\ProdutosController@listagem')->name('admin.produtos.listagem');
    Route::get('/produtos/registro', 'Admin\ProdutosController@registro')->name('admin.produtos.registro');
    Route::get('/produtos/{id}', 'Admin\ProdutosController@edicao')->name('admin.produtos.edicao')->where(['id' => '[0-9]+']);
    Route::post('/produtos', 'Admin\ProdutosController@save')->name('admin.produtos.post');

    Route::get('/status', 'Admin\StatusController@index')->name('admin.status.index');
    Route::post('/status/listagem', 'Admin\StatusController@listagem')->name('admin.status.listagem');
    Route::get('/status/registro', 'Admin\StatusController@registro')->name('admin.status.registro');
    Route::get('/status/{id}', 'Admin\StatusController@edicao')->name('admin.status.edicao')->where(['id' => '[0-9]+']);
    Route::post('/status', 'Admin\StatusController@save')->name('admin.status.post');

});
