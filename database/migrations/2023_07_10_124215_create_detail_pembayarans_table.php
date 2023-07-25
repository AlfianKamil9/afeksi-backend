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
        Schema::create('detail_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_layanan_id');
            $table->date('tgl_konsultasi');
            $table->string('jam_konsultasi');
            $table->string('detail_masalah');
            $table->timestamps();

            $table->foreign('pembayaran_layanan_id')->references('id')->on('pembayaran_layanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembayarans');
    }
};
