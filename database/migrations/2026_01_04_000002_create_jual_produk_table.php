<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {

    }

        Schema::create('jual_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        //Schema::table('jual_produk', function (Blueprint $table) {
            // optional: hapus kolom jika migration di-rollback
            //if (Schema::hasColumn('jual_produk', 'user_id')) {
                //$table->dropColumn('user_id');
            //}
        //});
    }
};
