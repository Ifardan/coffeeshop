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
        Schema::table('website_settings', function (Blueprint $table) {

            $table->string('favorite_title')->nullable();

            $table->string('favorite_col1_title')->nullable();
            $table->text('favorite_col1_items')->nullable();

            $table->string('favorite_col2_title')->nullable();
            $table->text('favorite_col2_items')->nullable();

            $table->string('favorite_col3_title')->nullable();
            $table->text('favorite_col3_items')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {

            $table->dropColumn([
                'favorite_title',

                'favorite_col1_title',
                'favorite_col1_items',

                'favorite_col2_title',
                'favorite_col2_items',

                'favorite_col3_title',
                'favorite_col3_items'
            ]);

        });
    }
};