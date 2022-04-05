<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->date('tgl_pesanan')->nullable();
            $table->time('waktu_pesanan')->nullable();
            $table->string('id_rumputlaut')->nullable();
            // $table->bigInteger('id_rumputlaut')->unsigned()->index()->nullable();
            // $table->bigInteger('user_id')->unsigned()->index()->nullable();
            // $table->foreign('id_rumputlaut')->references('id_rumputlaut')->on('produks')->onDelete('cascade');
            // $table->foreign('user_id')->references('no_ktp')->on('users')->onDelete('cascade');
            $table->string('user_id')->nullable();
            $table->string('jumlah_pesanan')->nullable();
            $table->integer('total_pesanan')->nullable();
            $table->string('status_pesanan')->nullable();
            $table->string('ekspedisi_pesanan')->nullable();
            $table->string('konfirmasi_pesanan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->text('isi_testimoni')->nullable();
            $table->date("tgl_testimoni")->nullable();
            $table->text("balasan_testimoni")->nullable();
            $table->integer("bintang_testimoni")->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
