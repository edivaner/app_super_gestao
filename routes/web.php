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

Route::get('/', 'PrincipalController@index')->name('site.index');
Route::get('/contato', 'ContatoController@index')->name('site.contato');
Route::post('/contato', 'ContatoController@index')->name('site.contato');


Route::get('/sobrenos', 'SobrenosController@index')->name('site.sobrenos');
Route::get('/login', function(){ return "login"; })->name('site.login');
Route::get('/sefaz', 'SefazController@index')->name('site.sefaz');



Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores','FornecedorController@index')->name('app.fornecedor');
    Route::get('/produtos', function() { return 'Produtos'; })->name('app.produtos');
});

Route::fallback(function(){
    echo "A rota acessada não existe. <a href='".route('site.index')."'> Clique aqui</a>";
});