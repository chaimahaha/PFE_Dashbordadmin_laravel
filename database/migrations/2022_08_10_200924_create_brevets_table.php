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
        Schema::create('brevets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('annee');
            $table->string('auteur');
            $table->string('mail');
            $table->string('auteurex');
            $table->string('mailex');
            $table->string('file');
            $table->string('sujet');
            $table->string('date') ;                                           
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
        Schema::dropIfExists('brevets');
        Schema::create('brevets', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
