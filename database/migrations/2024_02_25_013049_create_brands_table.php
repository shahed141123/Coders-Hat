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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->string('slug', 40)->unique();
            $table->string('logo', 220)->nullable();
            $table->string('image', 220)->nullable();
            $table->string('banner_image', 220)->nullable();
            $table->text('description')->nullable();
            $table->string('url', 255)->nullable();
            $table->string('status')->default('active')->comment('inactive,active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
