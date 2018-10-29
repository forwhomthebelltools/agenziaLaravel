<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFkToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->default(1); //i prodotti apparterranno all'utente 1 di default
            //->nullable(); non mette zero
            //dopo aver creato il campo e la relazione, aggiungo un vincolo di integrità referenziale
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_user_id_foreign'); //prima cancellerò il vincolo
            //nometabella_nomecolonnavincolata_foreign
            $table->dropColumn('user_id'); //e poi cancellerò la colonna
        });
    }
}
