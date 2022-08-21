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
        Schema::create('manifestations', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->String('lieu');
            $table->String('prix');
            $table->Date('date_start');
            $table->Date('date_end');
            $table->String('class');
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
        Schema::dropIfExists('manifestations');
        Schema::create('manifestations', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
