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
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('kategori', ['internal', 'eksternal']);
            $table->string('email')->nullable();
            $table->string('phone_no');
            $table->unsignedBigInteger('campaign_id');
            $table->string('amount');
            $table->text('message')->nullable();
            $table->unsignedBigInteger('rekening_id');   
            $table->enum('payment_status', ['paid', 'failed', 'pending']);
            $table->string('payment_date');
            $table->string('payment_proof');
            $table->enum('status', ['verified', 'unverified']);
            $table->string('verified_by')->nullable();
            $table->string('verified_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Kolom foreign key
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaturs');
    }
};
