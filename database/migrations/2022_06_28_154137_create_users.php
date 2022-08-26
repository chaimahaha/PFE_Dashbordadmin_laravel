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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin')->nullable();
            $table->string('numpassport')->nullable();
            $table->string('cnrps')->nullable();
            $table->string('gender')->nullable();
            $table->string('grade')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('specialite')->nullable();
            $table->string('diplome')->nullable();
            $table->string('date')->nullable();
            $table->string('fctadmin')->nullable();
            $table->string('scopus')->nullable();
            $table->string('orcid')->nullable();
            $table->string('tel')->nullable();
            $table->string('telfax')->nullable();
            $table->string('datediplome')->nullable();
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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
