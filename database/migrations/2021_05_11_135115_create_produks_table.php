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
            $table->string("stok_rumputlaut")->nullable();
            $table->string("gambar_rumputlaut")->nullable();
            $table->bigInteger('no_ktp')->unsigned()->index()->nullable();
            $table->foreign('no_ktp')->references('no_ktp')->on('users')->onDelete('cascade');
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
