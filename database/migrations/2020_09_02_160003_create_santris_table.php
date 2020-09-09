<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('asal')->nullable();
            $table->unsignedInteger('idAsrama')->nullable();
            $table->timestamps();

            $table->foreign('idAsrama')->references('id')->on('asramas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
}
