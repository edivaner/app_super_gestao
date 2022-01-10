<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('fornecedores', function(Blueprint $table){
            $table->string('uf', 2);
            $table->string('email', 150);
            $table->string('site', 150);
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
        schema::table('fornecedores', function(Blueprint $table){
            // $table->dropColumn('uf');
            // $table->dropColumn('email');
            // $table->dropColumn('site');
            
            // $table->dropColumn(['uf','email', 'site']);
        });
    }
}
