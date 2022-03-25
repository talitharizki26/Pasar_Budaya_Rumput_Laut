<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembudidayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembudidayas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembudidaya')->nullable();
            $table->string('nohp_pembudidaya')->nullable();
            $table->string('alamat_pembudidaya')->nullable();
            $table->string('tgllahir_pembudidaya')->nullable();
            $table->string('foto_pembudidaya')->nullable();
            $table->bigInteger('id_users')->unsigned()->index()->nullable();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pembudidayas');
    }
}
