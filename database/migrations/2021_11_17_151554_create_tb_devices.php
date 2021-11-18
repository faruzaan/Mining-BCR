<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_devices', function (Blueprint $table) {
            $table->increments('id_device');
            $table->string('nama_device', 100)->nullable()->default('text');
            $table->decimal('hashrate_device', 8, 2)->nullable()->default(123.45);
            $table->integer('watt_device')->unsigned()->nullable()->default(12);
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
        Schema::dropIfExists('tb_devices');
    }
}
