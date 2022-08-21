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
        Schema::create('article_scs', function (Blueprint $table) {
            $table->id();
            $table->string('annee');
            $table->string('titre');
            $table->string('lien');
            $table->string('file');
            $table->string('date');
            $table->string('auteur');
            $table->string('mail');
            $table->string('auteurex');
            $table->string('mailex');
            $table->string('titre_journal');
            $table->string('quartile');
            $table->string('volume');
            $table->string('impact');
            $table->string('indexation');
            $table->string('site_revue');           
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
        Schema::dropIfExists('article_scs');
        Schema::create('article_scs', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
