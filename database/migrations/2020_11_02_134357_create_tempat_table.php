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
            $table->string('namaTempat',30);
            $table->string('alamat',50);
            $table->boolean('status');
            $table->decimal('saldo',12,0)->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('tempat', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
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
