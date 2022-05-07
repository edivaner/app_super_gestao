<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        echo $metodo_autenticacao.'-'.$perfil.'<br>';
        //verifica se o usuario tem acesso a rota

        if($metodo_autenticacao == 'padrao'){
            echo "verificar logi e senha $perfil".'<br>';
        }else if($metodo_autenticacao == 'ldap'){
            echo "verificar usuario e senha no AD $perfil".'<br>';
        }

        if($perfil == 'visitante'){
            echo "rrestringir acesso".'<br>';
        }else{
            echo "exibir perfil".'<br>';
        }

        if(true){
            return $next($request);
        }else{
            return response("Acesso negado! Rota precisa de autenticação $perfil");
        }

    }
}
