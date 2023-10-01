<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('idTrans');
            $table->unsignedBigInteger('idCust');
            $table->unsignedBigInteger('idAset');
            $table->string('waktu_awal');
            $table->string('waktu_akhir');
            $table->string('jaminan');
            $table->integer('dp');
            $table->integer('total_bayar');
            $table->string('bukti_jaminan');
            $table->unsignedBigInteger('status');

            // Define foreign key constraints
            $table->foreign('idCust')
                ->references('idCust')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('idAset')
                ->references('idAset')
                ->on('asets')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('status')
                ->references('idStatus')
                ->on('status_trans')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
