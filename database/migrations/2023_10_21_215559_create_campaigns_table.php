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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('image');
            $table->string('carousel');
            $table->string('video');
            $table->string('goal');
            $table->string('raised');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->enum('status', ['open', 'close', 'hold'])->default('close');
            $table->unsignedBigInteger('user_id'); // Kolom foreign key

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Menyambungkan foreign key ke tabel users
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
