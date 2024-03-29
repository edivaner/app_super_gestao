<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutosDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        // Sem eloquent ORM
        /*foreach($produtos as $key => $produto){
            // print_r($produto->getAttributes());
            // echo "<br/>";
            // echo "<br/>";

            $produtoDetalhe = ProdutosDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)){
                // print_r($produtoDetalhe->getAttributes());

                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }

            // echo "<br/>";
            // echo "<hr/>";

        }*/

        //Com elequent ORM, cria metodo no model e chama na view


                                
        return view('app.produto.index', ['produtos'=>$produtos, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidade = Unidade::all();
        return view('app.produto.create', ['unidades'=>$unidade]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $regras = [
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'required|min:3|max:2000',
            'peso'          => 'required|integer',
            'unidade_id'    => 'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição  deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade adicionada não existe',
        ];

        $request->validate($regras,$feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
        // dd($produto);
        return view('app.produto.show', ['produto'=>$produto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto'=>$produto, 'unidades' => $unidades]);
        // return view('app.produto.create', ['produto'=>$produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        // UPDATE PUT
        $produto->update($request->all()); 
        return redirect()->route('produto.show', ['produto'=>$produto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
        // dd($produto);
        $produto->delete();
        return redirect()->route('produto.index', ['produtos'=>$produto]);
    }
}
