<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal_pengajuan');
            $table->decimal('kredit',16,0);
            $table->dateTime('tanggal_pencairan');
            $table->string('status');
            $table->string('bukti');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('mitra_id');
        });

        Schema::table('withdrawals', function(Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('mitra_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawals');
    }
}
