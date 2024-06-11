<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('kode_inventaris');
            $table->string('jenis_barang');
            $table->string('serial_number')->nullable();
            $table->string('merk_type')->nullable();
            $table->date('tanggal_registrasi')->nullable();

            // Kolom khusus untuk PC
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('disk')->nullable();
            $table->string('os')->nullable();
            $table->string('vga')->nullable();

            // Kolom khusus untuk Non-PC
            $table->string('tipe_barang')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
