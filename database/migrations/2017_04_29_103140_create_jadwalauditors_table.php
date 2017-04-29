<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalauditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalAuditors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idAuditor');
            $table->string('timAuditor');
            $table->string('regionalAuditor');
            $table->string('namaKegiatan');
            $table->date('waktuKegiatan');
            $table->string('tempatKegiatan');
            
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
        Schema::drop('jadwalAuditors');
    }
}
}
