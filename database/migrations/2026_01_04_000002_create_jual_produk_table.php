<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {

    }

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
