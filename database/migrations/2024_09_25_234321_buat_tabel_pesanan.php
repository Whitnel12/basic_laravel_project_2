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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota');
            $table->string('pelanggan');
            $table->foreignId('paket_id')->constrained('daftar_paket')->onDelete('cascade');
            $table->integer('berat');
            $table->decimal('harga');
            $table->decimal('total_harga');
            $table->string('status')->default('antrian');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};  