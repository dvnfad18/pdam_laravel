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
        Schema::create('beli', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_beli');
            $table->integer('harga_beli');
            $table->unsignedBigInteger('idAset');
            $table->timestamps();

            $table->foreign('idAset')->references('idAset')->on('asets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli');
    }
};
