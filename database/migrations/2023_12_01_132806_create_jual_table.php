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
        Schema::create('jual', function (Blueprint $table) {
            $table->id('id_jual');
            $table->integer('total');
            $table->integer('total_final');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('jamAwal');
            $table->string('jamAkhir');
            $table->date('tanggal');
            $table->integer('sisa_bayar');
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['Belum Bayar', 'Dibayar', 'Dikemas', 'Dikirim', 'Selesai', 'Konfirmasi Admin'])->default('Belum Bayar');
            $table->string('nama_lengkap');
            $table->unsignedBigInteger('idCust');
            $table->timestamps();

            $table->foreign('idCust')->references('idCust')->on('customers');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jual');
    }
};
