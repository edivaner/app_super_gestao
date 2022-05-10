<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = "Login e/ou senha incorreto(s)";
        }else if($request->get('erro') == 2){
            $erro = "Necessário realizar login para ter acesso a essa página!";
        }
        return view('site.login', ['titulo'=>'Login', 'erro'=>$erro]);
    }

    public function autenticar(Request $request){
        //Regras de validação
        $regras = [
            'usuario' => 'required|email',
            'senha' =>  'required|min:3'
        ];

        // As mensagens da validação
        $feedback = [
            'usuario.required' => 'É necessario informar um login',
            'usuario.email'    => 'O login informado não é um email válido',
            'senha.required'   => 'É necessário informar uma senha',
            'senha.min'        => 'Senha informada é curta demais'
        ];

        // Se não passar no validate volta a rota anterior
        $request->validate($regras, $feedback);

        $email = $request->usuario;
        $senha   = $request->senha;

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name; 
            $_SESSION['email'] = $usuario->email; 

            return redirect()->route('app.home');
        }else{
            $_SESSION['nome'] = array();
            $_SESSION['email'] = array();
            return redirect()->route('site.login', ['erro'=>1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
