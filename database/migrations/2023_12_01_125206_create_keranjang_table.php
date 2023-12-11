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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_keranjang');
            $table->unsignedBigInteger('idCust');
            $table->unsignedBigInteger('idAset');
            $table->integer('qty');
            $table->enum('status', ['Belum', 'Selesai'])->default('Belum');
            $table->timestamps();

            $table->foreign('idCust')->references('idCust')->on('customers');
            $table->foreign('idAset')->references('idAset')->on('asets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
