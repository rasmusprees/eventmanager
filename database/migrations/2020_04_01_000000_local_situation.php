<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LocalSituation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_situation', function (Blueprint $table) {
            $table->increments('situation_id')->nullable();
            $table->string('local_activities')->nullable();
            $table->string('stay_at_night')->nullable();
            $table->integer('mission_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_situation');
    }
}
