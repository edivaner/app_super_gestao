<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class siteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /*$contato = new SiteContato();
        $contato->nome = 'Sistemas SG';
        $contato->telefone = '11998989898';
        $contato->email = 'sistemassg@gmail.com';
        $contato->motivo = 1;
        $contato->mensagem = 'Seja bem-vindo ao sistema super gestão';

        $contato->save();*/

        factory(SiteContato::class, 100)->create();


    }
}
