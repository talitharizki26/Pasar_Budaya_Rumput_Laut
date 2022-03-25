<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id("id_rumputlaut");
            $table->string("jenis_rumputlaut")->nullable();
            $table->text("deskripsi_rumputlaut")->nullable();
            $table->integer("harga_rumputlaut")->nullable();
            $table->string("lokasi_rumputlaut")->nullable();
            $table->integer("durasitahan_rumputlaut")->nullable();
            $table->string("ketersediaan_rumputlaut")->nullable();
            $table->string("gambar_rumputlaut")->nullable();
            $table->bigInteger('noktp_pembudidaya')->unsigned()->index()->nullable();
            // $table->foreign('noktp_pembudidaya')->references('id')->on('pembudidaya')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
