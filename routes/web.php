<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
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

//Route::get('/', function () {
//    return view('Bem-vindo');
//});

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'index'])
    ->name('site.index')->middleware('log.acesso');
Route::get('/sobre', [\App\Http\Controllers\SobreNosController::class, 'sobre'])->name('site.sobre');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.salvaar');
Route::get('login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('login', [LoginController::class, 'autenticar'])->name('site.login');
//Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'index'])->name('teste');

//Redirecionamento

//Route::get('/rota1', function(){
//    echo 'Rota 1';
//})->name('site.rota1');

//Route::redirect('rota2', 'rota1');
//
//Route::get('rota2', function(){
//    return redirect()->route('site.rota1');
//})->name('site.rota2');
//Route::get('
//        /contat/{nome}/{categoria_id}',
//       function(
//           string $nome = 'Desconhecido',
//           int $categoria_id = 1
//       ){
//            echo "Nome:  $nome - $categoria_id";
//       }
//)->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');

//FALBACK

//route::fallback(function(){
//  //  echo "Pagina nao encontrada. <a href="'route('site.index')'"> acesse aqui </a> ";
//    echo 'Nao encontrada <a href="'.route('site.index').'"> Acesse</a> ';
//});


