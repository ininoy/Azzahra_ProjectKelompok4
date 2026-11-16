<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {$table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');$table->string('nama_pembeli');
            $table->string('no_hp');$table->text('alamat');
            $table->integer('jumlah');$table->integer('total_harga');
            $table->string('status')->default('Baru'); // Baru, Diproses, Selesai$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
