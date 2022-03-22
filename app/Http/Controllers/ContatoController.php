<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        /*
        echo '<pre>';
            print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br/>';
        echo $request->input('telefone');
       */

        //  $contato = new SiteContato();

       /*$contato->nome = $request->input('nome');
       $contato->telefone = $request->input('telefone');
       $contato->email = $request->input('email');
       $contato->motivo = $request->input('motivo_contato');
       $contato->mensagem = $request->input('mensagem');*/

        //print_r($contato->getAttributes());

        //$contato->save();

        // $contato->create($request->all());

        /*$contato->fill($request->all());
        $contato->save();
        print_r($contato->getAttributes());*/

        /*$motivo_contatos = [
            '1' => 'Dúvida',
            '5' => 'Elogio',
            '3' => 'Reclamação'
        ];*/

        $motivo_contatos = MotivoContato::all();

        return view("site.contato", ['titulo' => 'Contatos', 'motivo_contatos' => $motivo_contatos ]);
    }

    public function salvar(Request $request){
        // SiteContato::create($request->all());

        $request->validate(
            [
                'nome'               => 'required|min:3|max:40|unique:site_contatos', //Permitir no minimo 3 e no maximo 40 caracteres |unico na tabela site_contatos
                'telefone'           => 'required',
                'email'              => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem'           => 'required|max:2000'
            ],
            [
                // 'nome.required'      => 'O nome precisa ser preenchido',
                'nome.min'           => 'O nome precisa ter no mínimo 3 caracteres',
                'nome.max'           => 'O nome precisa ter no máximo 40 caracteres',
                'nome.unique'        => 'Já existe um registro com este nome',
                'telefone.required'  => 'O telefone precisa ser preenchido',
                // 'email.required'     => 'O email precisa ser preenchido',
                'motivo_contatos_id.required' => 'Selecione o motivo do contato',
                'mensagem.required'  => 'Mensagem precisa ser preenchida',
                'mensagem.max'       => 'Mensagem precisa ter no maximo 2000 caracteres',

                'required'          => 'O campo :attribute precisa ser preenchido'
            ]
        );
        
        $contato = new SiteContato();
        $contato->create($request->all());

        return redirect()->route('site.index');
    }
}
