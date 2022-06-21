<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request ){
        $errorMsg = '';

        if($request->input('_token') != ''){
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $mensagens = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no minimo 3 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 40 caracteres',
                'email.email' => 'Este email não é valido'
            ];

            $request->validate($regras, $mensagens);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //dados para a view
            $errorMsg = 'Cadastro realizado com sucesso';
        }

        return view('app.fornecedor.adicionar', ['msg'=>$errorMsg]);
    }
}
