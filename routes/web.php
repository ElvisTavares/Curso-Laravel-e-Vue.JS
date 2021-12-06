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

//Route::get('/', function () {
//    return view('Bem-vindo');
//});

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre', [\App\Http\Controllers\SobreNosController::class, 'sobre'])->name('site.sobre');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function(){ return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos'; })->name('site.produtos');
});

//Redirecionamento

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

//Route::redirect('rota2', 'rota1');

Route::get('rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');
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

route::fallback(function(){
  //  echo "Pagina nao encontrada. <a href="'route('site.index')'"> acesse aqui </a> ";
    echo 'Nao encontrada <a href="'.route('site.index').'"> Acesse</a> ';
});


