<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLapanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jenis_olahraga');
            $table->string('jenis_lapangan');
            $table->decimal('sewa',7,2);
            $table->string('gambar');
            $table->boolean('status');
            $table->unsignedBigInteger('tempat_id');
            $table->timestamps();
        });

        Schema::table('lapangan', function(Blueprint $table) {
            $table->foreign('tempat_id')->references('id')->on('tempat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lapangan');
    }
}
