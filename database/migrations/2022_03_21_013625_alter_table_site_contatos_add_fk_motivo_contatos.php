<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //Atribuindo motivo contato para a nova coluna motivo_contato_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo');

        //Criando a fk e removendo a coluna motivo
        Schema::table('site_contatos', function (Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        //criar a coluna motivo e removendo fk
        Schema::table('site_contatos', function (Blueprint $table){
            $table->integer('motivo');
            $table->dropForeign('site_contatos_ motivo_contatos_id_foreign');
        });

        //Atribuindo motivo_contato_id para a coluna motivo
        DB::statement('update site_contatos set motivo = motivo_contatos_id');

        //removendo a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
