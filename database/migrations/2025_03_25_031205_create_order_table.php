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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customer')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_layanan')->constrained('layanan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_paket_layanan')->constrained('paket')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_cabang')->constrained('cabang')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl_order');
            $table->decimal('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
