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


Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::get('/sobrenos', 'SobrenosController@index')->name('site.sobrenos');
Route::get('/sefaz', 'SefazController@index')->name('site.sefaz');



Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    
    Route::get('/fornecedor','FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    // Route::post('/fornecedor/cadastrar','FornecedorController@cadastrar')->name('app.fornecedor.cadastrar');
    
});

Route::fallback(function(){
    echo "A rota acessada não existe. <a href='".route('site.index')."'> Clique aqui!</a>";
});