<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('harga_promo')->nullable()->after('harga');
            $table->string('ukuran')->nullable()->after('stok'); // Contoh: S, M, L, XL
            $table->string('bahan')->nullable()->after('ukuran'); // Contoh: Katun Toyobo, Ceruty
            $table->string('info_penjualan')->nullable()->after('bahan'); // Contoh: Terlaris, Diskon 50%, Baru
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['harga_promo', 'ukuran', 'bahan', 'info_penjualan']);
        });
    }
};
