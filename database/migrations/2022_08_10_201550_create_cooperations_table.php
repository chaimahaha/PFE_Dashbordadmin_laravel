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
        Schema::create('cooperations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('intervenantnat');
            $table->string('intervenantin');
            $table->string('sujet');
            $table->string('institution');
            $table->string('file');
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
        Schema::dropIfExists('cooperations');
        Schema::create('cooperations', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
    }
};
