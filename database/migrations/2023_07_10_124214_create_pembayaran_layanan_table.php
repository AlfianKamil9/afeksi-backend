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
        Schema::create('pembayaran_layanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->unsignedBigInteger('paket_professional_conseling_id')->nullable();
            $table->unsignedBigInteger('mentoring_id')->nullable();
            $table->unsignedBigInteger('conseling_id')->nullable();
            $table->unsignedBigInteger('profesional_conseling_id')->nullable();
            $table->unsignedBigInteger('psikolog_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->default('UNPAID', 'PAID');
            $table->timestamps();

            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('paket_professional_conseling_id')->references('id')->on('paket_profesional_conselings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mentoring_id')->references('id_Mentoring')->on('mentorings')->onDelete('cascade');
            $table->foreign('conseling_id')->references('id_conseling')->on('conselings')->onDelete('cascade');
            $table->foreign('profesional_conseling_id')->references('id_profConseling')->on('profresional_conselings')->onDelete('cascade');
            $table->foreign('psikolog_id')->references('id')->on('psikologs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_layanans');
    }
};
