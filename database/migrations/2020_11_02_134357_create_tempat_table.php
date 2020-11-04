<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaTempat');
            $table->string('alamat');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });

        Schema::table('tempat', function(Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempat');
    }
}
