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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('company')->nullable();
            $table->text('message')->nullable();
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('rating')->nullable(); // Added rating
            $table->string('location')->nullable(); // Added location
            $table->enum('status', ['active', 'inactive'])->default('inactive')->nullable(); // Added status
            $table->string('video_url')->nullable(); // Added video URL
            $table->string('company_logo')->nullable(); // Added company logo
            $table->string('website')->nullable(); // Added website
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
