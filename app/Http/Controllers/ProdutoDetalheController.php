<?php

namespace App\Http\Controllers;

use App\ProdutosDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades'=>$unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        ProdutosDetalhe::create($request->all());
        echo "cadastro realizado com sucesso";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  App/ProdutosDetalhes
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutosDetalhe $produtoDetalhe)
    {
        //
        // dd($produtoDetalhe);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe'=>$produtoDetalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\ProdutosDetalhes $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutosDetalhe $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
        echo 'Atualização feita com sucesso.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
