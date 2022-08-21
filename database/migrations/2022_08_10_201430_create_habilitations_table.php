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
        Schema::create('habilitations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('nom');
            $table->string('annee');
            $table->string('file');
            $table->string('encadrant');
            $table->string('mail_encadrant');
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
        Schema::dropIfExists('habilitations');
        Schema::create('habilitations', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
