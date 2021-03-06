<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $request - manipular
        // return $next($request);
        // $response - manipular 

        // dd($request);

        $ip  = $request->server->get("REMOTE_ADDR");
        $rota = $request->server->get("REQUEST_URI");

        LogAcesso::create(['log' => "IP: ($ip) requisitou a rota ($rota)"]);

        //return $next($request);

        $resposta = $next($request);

        return $resposta;

        // return Response('Chegamos no middleware');
    }
}
