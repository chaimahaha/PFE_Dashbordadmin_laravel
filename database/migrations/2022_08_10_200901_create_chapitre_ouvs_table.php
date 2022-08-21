<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitre_ouvs', function (Blueprint $table) {
            $table->id();
            $table->string('annee');   
            $table->string('auteur');
            $table->string('mail');
            $table->string('auteurex');
            $table->string('mailex');
            $table->string('titre');
            $table->string('editeur');
            $table->string('lien');
            $table->string('edition');
            $table->string('isbn');
            $table->string('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitre_ouvs');
        Schema::create('chapitre_ouvs', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
