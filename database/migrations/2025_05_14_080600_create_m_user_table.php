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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('level_id');
            $table->string('password');
            $table->timestamps();
        
            // Foreign key ke m_level (pakai level_id, bukan id)
            $table->foreign('level_id')->references('level_id')->on('m_level')->onDelete('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
