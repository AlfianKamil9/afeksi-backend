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
        Schema::create('event_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->string('ref_transaction_event')->default('WEB-', 'CAM-');
            $table->string('payment_method')->nullable();
            $table->string('total_payment')->nullable();
            $table->string('fee_transaction')->nullable();
            $table->date('date_order');
            $table->enum('status', ['PAID', 'UNPAID', "PENDING", 'FREE', 'EXPIRE', 'DENIED']);
            $table->string('info_from')->nullable();
            $table->string('proof_follow_ig')->nullable();
            $table->string('proof_follow_linkdin')->nullable();
            $table->string('proof_share_poster')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_transactions');
    }
};
