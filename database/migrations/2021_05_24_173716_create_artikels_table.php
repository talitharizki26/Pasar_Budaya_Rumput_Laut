<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id("id_artikel");
            $table->string("judul_artikel")->nullable();
            $table->text("isi_artikel")->nullable();
            $table->text("sumber_artikel")->nullable();
            $table->date("tglupload_artikel")->nullable();
            $table->string("gambar_artikel")->nullable();
            $table->bigInteger('no_ktp')->unsigned()->index()->nullable();
            $table->foreign('no_ktp')->references('no_ktp')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('artikels');
    }
}
