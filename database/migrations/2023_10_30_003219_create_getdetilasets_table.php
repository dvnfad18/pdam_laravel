<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('getdetilasets', function (Blueprint $table) {
            $table->id('idDetil');
            $table->unsignedBigInteger('idAset'); // Foreign key column
            $table->string('nama_aset');
            $table->integer('jumlah_aset');
            $table->integer('harga');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->unsignedBigInteger('idKategori'); // Foreign key column
            $table->boolean('isLiked')->nullable();
            $table->timestamps();

            $table->foreign('idKategori')
                ->references('idKategori')
                ->on('kategoris')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idAset')
                ->references('idAset')
                ->on('asets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('getdetilasets');
    }
};
