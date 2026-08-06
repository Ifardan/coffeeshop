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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            // ABOUT
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();

            // CONTACT
            $table->string('contact_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();

            // HERO
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // FEATURE 1
            $table->string('feature1_title')->nullable();
            $table->text('feature1_desc')->nullable();

            // FEATURE 2
            $table->string('feature2_title')->nullable();
            $table->text('feature2_desc')->nullable();

            // FEATURE 3
            $table->string('feature3_title')->nullable();
            $table->text('feature3_desc')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};