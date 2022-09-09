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
        Schema::create('masters', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('annee');
            $table->string('file');
            $table->string('description');
            $table->string('encadrant');
            $table->string('mail_encadrant');
            $table->string('encadrant_2');
            $table->string('mail_encadrant_2');
            $table->string('institut');
            $table->string('etudiant');
            $table->string('date_start');
            $table->string('date_end');
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
        Schema::dropIfExists('masters');
    }
};
