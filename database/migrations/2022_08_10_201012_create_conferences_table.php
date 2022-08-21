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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->string('annee');
            $table->string('titre');
            $table->string('date');
            $table->string('file');
            $table->string('auteur');
            $table->string('mail');
            $table->string('auteurex');
            $table->string('mailex');
            $table->string('confname');
            $table->string('class');  
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
        Schema::dropIfExists('conferences');
        Schema::create('conferences', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
