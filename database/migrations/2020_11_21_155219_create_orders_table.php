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
            $table->time('start');
            $table->time('end');
            $table->string('status');
            $table->unsignedBigInteger('id_lapangan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('payments_id');
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('id_lapangan')->references('id')->on('lapangan');
            $table->foreign('id_user')->references('id')->on('users');
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
