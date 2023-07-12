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
        Schema::create('paket_profesional_conselings', function (Blueprint $table) {
            $table->id();
            $table->varchar('nama_paket');
            $table->enum('status', ['Junior', 'Senior']);
            $table->varchar('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_profesional_conselings');
    }
};
