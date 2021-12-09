<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHashrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hashrate', function (Blueprint $table) {
            $table->increments('id_hashrate');
            $table->string('id_device', 100)->nullable()->default('text');
            $table->string('algo', 100)->nullable()->default('text');
            $table->integer('watt')->unsigned()->nullable()->default(12);
            $table->decimal('blockReward', 8, 2)->nullable()->default(123.45);
            $table->integer('difficulity')->unsigned()->nullable()->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_hashrate');
    }
}
