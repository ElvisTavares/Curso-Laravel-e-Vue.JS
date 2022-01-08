<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criar tabela filiais
        schema::create('filiais',function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        //tabela produto_filiais
        schema::create('produtos_filiais', function (Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('fillial_id');
           $table->unsignedBigInteger('produto_id');
           $table->decimal('preco_venda', 8,2);
           $table->integer('estoque_minimo');
           $table->integer('estoque_maximo');
           $table->timestamps();

           //Foreign keys
           $table->foreign('fillial_id')->references('id')->on('filiais');
           $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos 
        schema::table('produtos', function (Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adcionamr colunas da tabela produtos
        schema::table('produtos', function (Blueprint $table){
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        schema::dropIfExists('produto_filiais');
        schema::dropIfExists('filiais');
    }
}
