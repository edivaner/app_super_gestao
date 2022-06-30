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

    public function listar(Request $request){
        $fornecedor = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
                                ->where('site', 'like', '%'.$request->input('site').'%')
                                ->where('uf', 'like', '%'.$request->input('uf').'%')
                                ->where('email', 'like', '%'.$request->input('email').'%')
                                ->paginate(2);
        // dd($fornecedor);
        return view('app.fornecedor.listar', ['fornecedores'=>$fornecedor, 'request'=>$request->all()]);
    }

    public function adicionar(Request $request ){
        $errorMsg = '';
        $update   = false;

        //inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
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

        }else if($request->input('_token') != '' && $request->input('id') != ''){
            //Edição
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $errorMsg = 'Alteração Realizado com sucesso';
            }else{
                $errorMsg = 'Alteração Falhou';
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->id, 'msg'=>$errorMsg]);
        }

        return view('app.fornecedor.adicionar', ['msg'=>$errorMsg]);
    }

    public function editar(Request $request){
        $idFornecedor = $request->id;

        $fornecedor = Fornecedor::find($idFornecedor);
        // dd($fornecedor);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg'=>$request->msg]);
    }
}
