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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('order')->nullable();
            $table->string('phone')->nullable();
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('github')->nullable();
            $table->string('website')->nullable();
            $table->string('discord')->nullable();
            $table->string('portfolio')->nullable();
            $table->text('biography')->nullable(); // Biography field
            $table->string('location')->nullable(); // Location field
            $table->date('start_date')->nullable(); // Start date field
            $table->text('skills')->nullable(); // Skills field
            $table->text('awards')->nullable(); // Awards/Recognition field
            $table->text('interests')->nullable(); // Interests/Hobbies field
            $table->string('language')->nullable(); // Language proficiencies field
            $table->string('status')->nullable(); // Status field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
