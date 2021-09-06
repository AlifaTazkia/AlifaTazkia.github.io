<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nis');
            $table->string('nama_mapel');
            $table->string('nama_tugas');
            $table->dateTime('deadline_time');
            $table->integer('status_pengerjaan');
            $table->integer('skor');
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
        Schema::dropIfExists('tbl_tugas');
    }
}
