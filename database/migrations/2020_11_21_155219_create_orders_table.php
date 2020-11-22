<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('tanggalPemesanan');
            $table->time('start');
            $table->time('end');
            $table->string('status');
            $table->string('catatan');
            $table->unsignedBigInteger('lapangan_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payments_id');
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('lapangan_id')->references('id')->on('lapangan');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payments_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
