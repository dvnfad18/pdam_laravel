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
        Schema::create('asets', function (Blueprint $table) {
                $table->id('idAset');
                $table->string('nama_aset');
                $table->string('alamat_aset');
                $table->unsignedBigInteger('tipe'); // Foreign key column
                $table->integer('harga');
                
                // Define the foreign key constraint
                $table->foreign('tipe')
                    ->references('idTipe')
                    ->on('tipe_asets')
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
        Schema::dropIfExists('asets');
    }
};
