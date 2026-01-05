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
        Schema::create('jual_produk', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('jenis_produk');
            $table->string('nama_produk');
            $table->decimal('harga', 12, 2);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jual_produk');
    }
};
