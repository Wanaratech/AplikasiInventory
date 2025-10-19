<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_chart_akun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipeakun');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->text('keterangan')->nullable();
            $table->decimal('saldo_awal', 15, 2)->default(0);
            $table->date('tanggal_saldo_awal')->nullable();
            $table->timestamps();

            //membuat relasi
            $table->foreign('id_tipeakun')
                ->references('id')->on('tb_tipeakun')// refrensi diambil dari id yang ada pada tb kategori
                ->onUpdate('cascade') // Jika nama kategori diubah, foreign key tetap valid
                ->onDelete('restrict');// jika ada barang maka tidak bisa dihapus;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_chart_akun');
    }
};
