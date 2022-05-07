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

/* Exemplo de middleware no inicio da rota
Route::middleware(LogAcessoMiddleware::class)
        ->get('/', 'PrincipalController@principal')
        ->name('site.index');*/

/* exemplo de middleware no fim da rota
Route::get('/contato', 'ContatoController@contato')->name('site.contato')->middleware(LogAcessoMiddleware::class);*/
        
Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');


Route::get('/sobrenos', 'SobrenosController@index')->name('site.sobrenos');
Route::get('/login', function(){ return "login"; })->name('site.login');
Route::get('/sefaz', 'SefazController@index')->name('site.sefaz');



Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/clientes', function() { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores','FornecedorController@index')->name('app.fornecedor');
    Route::get('/produtos', function() { return 'Produtos'; })->name('app.produtos');
});

Route::fallback(function(){
    echo "A rota acessada não existe. <a href='".route('site.index')."'> Clique aqui</a>";
});