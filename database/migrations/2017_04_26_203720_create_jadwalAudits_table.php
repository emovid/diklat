<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalAudits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('timAudit');
            $table->string('regionalAudit');
            $table->string('unitKerjaAudit');
            $table->date('waktuMulaiAudit');
            $table->date('waktuSelesaiAudit');
            $table->string('keteranganAudit');
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
