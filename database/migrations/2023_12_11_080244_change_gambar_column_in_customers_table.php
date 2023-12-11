<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeGambarColumnInCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Mengubah kolom 'gambar' menjadi nullable
            $table->string('gambar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Jika perlu, Anda dapat mengembalikan perubahan di sini
            // Misalnya, mengubah kolom 'gambar' kembali menjadi nullable
            $table->string('gambar')->nullable(true)->change();
        });
    }
}
