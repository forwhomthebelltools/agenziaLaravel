<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductFkToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedInteger('product_id')->default(1); //i prodotti apparterranno all'utente 1 di default
            //->nullable(); non mette zero
            //dopo aver creato il campo e la relazione, aggiungo un vincolo di integrità referenziale
            $table->foreign('product_id')->references('id')->on('products');
            //in questo user_id ci devono essere solo i valori presenti nel campo id di users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_product_id_foreign'); //prima cancellerò il vincolo
            //nometabella_nomecolonnavincolata_foreign
            $table->dropColumn('product_id'); //e poi cancellerò la colonna
        });
    }
}
