<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => null,
                'cnpj' => '00.000.000/000-00',
                'ddd' => '11',
                'telefone' => '00000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => '11.111.111/111-11',
                'ddd' => '22',
                'telefone' => '11111-1111'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'N',
                'cnpj' => '22.222.222/222-22',
                'ddd' => '32',
                'telefone' => '22222-1111'
            ]
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
