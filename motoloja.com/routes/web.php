<?php

use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Administrativo\Administrativo;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','App\Http\Controllers\Website\WebsiteController@home');

Route::get('/categoria/{ProdutosCategorias}','App\Http\Controllers\Website\WebsiteController@categoria');
Route::get('/politicaPrivacidade','App\Http\Controllers\Website\WebsiteController@politicaPrivacidade');
Route::get('/produtos/{Produtos}','App\Http\Controllers\Website\WebsiteController@produtos');
Route::get('/sobrenos','App\Http\Controllers\Website\WebsiteController@sobrenos');
Route::get('/usuario','App\Http\Controllers\Website\WebsiteController@usuario');
Route::get('/home','App\Http\Controllers\Website\WebsiteController@home');
Route::get('/faleConosco','App\Http\Controllers\Website\WebsiteController@faleConosco');
Route::get('/editar','App\Http\Controllers\Website\WebsiteController@editar');
Route::get('/cadastro',  [WebsiteController::class, 'cadastrarUsuario']);
Route::post('/login/logar', 'App\Http\Controllers\Website\WebsiteController@logar')->name('login');
Route::post('/login/cadastrar','App\Http\Controllers\Website\WebsiteController@cadastrarUsuarioPost');
Route::get('/login/deslogar','App\Http\Controllers\Website\WebsiteController@deslogar');
Route::get('/login','App\Http\Controllers\Website\WebsiteController@login');
Route::get('/checkout','App\Http\Controllers\Website\WebsiteController@checkout');
Route::post('/usuario/editar','App\Http\Controllers\Website\WebsiteController@usuarioEditar');
Route::get('/buscar','App\Http\Controllers\Website\WebsiteController@buscar');



Route::get('/carrinho','App\Http\Controllers\Website\CarrinhoController@listar');
Route::post('/carrinho/adicionar','App\Http\Controllers\Website\CarrinhoController@adicionar');
Route::post('/carrinho/remover','App\Http\Controllers\Website\CarrinhoController@remover');
Route::post('/carrinho/decremento','App\Http\Controllers\Website\CarrinhoController@decremento');
Route::post('/carrinho/encremento','App\Http\Controllers\Website\CarrinhoController@encremento');

Route::prefix('/administrativo')->group(function () {
 Route::get('/', 'App\Http\Controllers\Administrativo\AdministrativoController@index');
 Route::get('/login', 'App\Http\Controllers\Administrativo\AdministrativoController@login');
 Route::get('/login/deslogar', 'App\Http\Controllers\Administrativo\AdministrativoController@deslogar');
 Route::post('/logar', 'App\Http\Controllers\Administrativo\AdministrativoController@logar');


    Route::prefix('/clientes')->group(function () {
        Route::get('/','App\Http\Controllers\Administrativo\ClientesController@listar');
        Route::get('/{idClientes}','App\Http\Controllers\Administrativo\ClientesController@detalhes');
        Route::get('/cadastro/{idClientes}', 'App\Http\Controllers\Administrativo\ClientesController@cadastro');
        Route::get('/cadastro/cadastrar', 'App\Http\Controllers\Administrativo\ClientesController@cadastro');
        Route::post('/salvar', 'App\Http\Controllers\Administrativo\ClientesController@salvar');
        Route::post('/deletar', 'App\Http\Controllers\Administrativo\ClientesController@deletar');
    });

    Route::prefix('/produtos')->group(function () {
        Route::get('/','App\Http\Controllers\Administrativo\ProdutosController@listar');
        Route::get('/{idProdutos}','App\Http\Controllers\Administrativo\ProdutosController@detalhes');
        Route::get('/cadastro/{idProdutos}', 'App\Http\Controllers\Administrativo\ProdutosController@cadastro');
        Route::get('/cadastro/cadastrar', 'App\Http\Controllers\Administrativo\ProdutosController@cadastro');
        Route::post('/salvar', 'App\Http\Controllers\Administrativo\ProdutosController@salvar');
        Route::post('/deletar', 'App\Http\Controllers\Administrativo\ProdutosController@deletar');
        Route::post('/imagem' , 'App\Http\Controllers\Administrativo\ProdutosImagensController@uploadImage');
        Route::post('/imagem/deletar' , 'App\Http\Controllers\Administrativo\ProdutosImagensController@deletar');
        Route::get('/imagem/imagemPrincipal/{idProduto}/{idImagem}' , 'App\Http\Controllers\Administrativo\ProdutosImagensController@definirImagemPrincipal');

    });

    Route::prefix('/categorias')->group(function () {
        Route::get('/','App\Http\Controllers\Administrativo\ProdutosCategoriasController@listar');
        Route::get('/{id}', 'App\Http\Controllers\Administrativo\ProdutosCategoriasController@detalhes');
        Route::get('/cadastro/{id}', 'App\Http\Controllers\Administrativo\ProdutosCategoriasController@cadastro');
        Route::get('/cadastro/cadastrar', 'App\Http\Controllers\Administrativo\ProdutosCategoriasController@cadastro');
        Route::post('/salvar', 'App\Http\Controllers\Administrativo\ProdutosCategoriasController@salvar');
        Route::post('/deletar', 'App\Http\Controllers\Administrativo\ProdutosCategoriasController@deletar');
    });
});