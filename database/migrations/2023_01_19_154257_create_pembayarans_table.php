<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('zis');
            $table->string('jenis_zis');
            $table->string('sapaan');
            $table->string('nama_pengirim');
            $table->string('no_pengirim');
            $table->string('email_pengirim');
            $table->integer('nominal');
            $table->string('nama_bank');
            $table->string('nama_rek_bank');
            $table->string('no_rek_bank');
            $table->string('bukti_pembayaran');
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
        Schema::dropIfExists('pembayarans');
    }
}