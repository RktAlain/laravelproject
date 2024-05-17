<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('id_cmd');
            $table->unsignedBigInteger('id_cli'); // Utilisation de unsignedBigInteger pour une clé étrangère
            $table->foreign('id_cli')->references('id_cli')->on('clients')->onDelete('cascade'); // Définition de la clé étrangère
            $table->string('code_cmd');
            $table->string('desg');
            $table->string('qte');
            $table->string('prix');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
