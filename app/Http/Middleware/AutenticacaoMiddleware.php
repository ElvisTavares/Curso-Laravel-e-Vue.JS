<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuario e senha no bd'. '<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'verificar usuario e senha do ad'. '<br>';
        }

        if ($$perfil == 'visiatante'){
            echo 'exibir apenas alguns parametros';
        }

       if(false){
           return $next($request);
       }else{
           return Response('Acesso negado');
       }

    }
}
