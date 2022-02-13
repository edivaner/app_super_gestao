<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome   = 'Fornecedor Cem';
        $fornecedor->site   = 'cem.com.br';
        $fornecedor->uf     = 'SP';
        $fornecedor->email = 'com@contato.com';

        $fornecedor->save();


        //outro metodo de inserção (array => atributo fillable na classe)
        Fornecedor::create([
            'nome'  => 'Forne Mil',
            'site'  => 'milfornecimentos.com.br',
            'uf'    => 'MG',
            'email' => 'mil.gmail.com'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome'=>'LogNet',
            'site'=>'lognet.com.br', 
            'uf'=>'SC', 
            'email'=>'logne.gmail.com.br'
        ]);



    }
}
