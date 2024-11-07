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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('gambar0');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->integer('stokS');
            $table->integer('stokM');
            $table->integer('stokL');
            $table->integer('stokXL');
            $table->integer('stok2XL');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
