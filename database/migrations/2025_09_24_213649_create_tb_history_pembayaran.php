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
        Schema::create('tb_history_pembayaran', function (Blueprint $table) {
            $table->bigInteger('idNota');
            $table->string('totalbayar');
            $table->string('dibayarkan');
            $table->string('sisa');
            $table->timestamp('pertanggal');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_history_pembayaran');
    }
};
