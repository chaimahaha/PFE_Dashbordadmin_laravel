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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('numpassport');
            $table->string('cnrps');
            $table->string('gender');
            $table->string('grade');
            $table->string('mail');
            $table->string('mdp');
            $table->string('photo');
            $table->string('specialite');
            $table->string('diplome');
            $table->string('date');
            $table->string('fctadmin');
            $table->string('scopus');
            $table->string('orcid');
            $table->string('tel');
            $table->string('telfax');
            $table->string('datediplome');
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
        Schema::dropIfExists('membres');
        Schema::create('membres', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
