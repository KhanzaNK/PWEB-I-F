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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('produk_id');
            $table->string('nama_produk');
            $table->integer('qty');
            $table->bigInteger('harga');
            $table->bigInteger('subtotal');
            $table->timestamps();
        });
    }

};
