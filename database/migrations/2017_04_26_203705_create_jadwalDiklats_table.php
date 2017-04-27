<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalDiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalDiklats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('timDiklat');
            $table->string('regionalDiklat');
            $table->string('namaDiklat');
            $table->string('waktuDiklat');
            $table->string('tempatDiklat');
            $table->string('statusDiklat');
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
        Schema::drop('jadwalDiklats');
    }
}
