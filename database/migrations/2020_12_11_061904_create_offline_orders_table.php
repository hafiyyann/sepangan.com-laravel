<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfflineOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offlineOrders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('tanggalPemesanan');
            $table->time('start');
            $table->time('end');
            $table->string('status');
            $table->string('catatan')->nullable();
            $table->string('namaPemesan',30);
            $table->string('nomorTelepon',13);
            $table->decimal('totalSewa',7,0);
            $table->unsignedBigInteger('lapangan_id');
            $table->foreign('lapangan_id')->references('id')->on('lapangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offlineOrders');
    }
}
