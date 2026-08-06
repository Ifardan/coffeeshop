<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('website_settings', 'hero_title')) {

            Schema::table('website_settings', function (Blueprint $table) {

                $table->string('hero_title')->nullable();
                $table->text('hero_subtitle')->nullable();

                $table->string('feature1_title')->nullable();
                $table->text('feature1_desc')->nullable();

                $table->string('feature2_title')->nullable();
                $table->text('feature2_desc')->nullable();

                $table->string('feature3_title')->nullable();
                $table->text('feature3_desc')->nullable();

            });

        }
    }

    public function down(): void
    {
        //
    }
};