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
        /*$contato = new SiteContato();
        $contato->create($request->all());*/

        $request->validate([
            'nome'           => 'required|min:3|max:40', //Permitir no minimo 3 e no maximo 40 caracteres
            'telefone'       => 'required',
            'emial'          => 'required',
            'motivo_contato' => 'required',
            'mensagem'       => 'required|max:2000'
        ]);
        
        $contato = new SiteContato();
        $contato->create($request->all());

    }
}
