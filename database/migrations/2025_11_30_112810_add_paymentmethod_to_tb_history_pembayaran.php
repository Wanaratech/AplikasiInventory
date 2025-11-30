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
        Schema::table('tb_history_pembayaran', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_paymentmethod'); // posisi bebas
        $table->foreign('id_paymentmethod')
            ->references('id')
            ->on('tb_metodepembayaran')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_history_pembayaran', function (Blueprint $table) {
            //
        });
    }
};
