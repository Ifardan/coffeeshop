<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {

            $table->string('hero_image')
                ->nullable()
                ->after('hero_subtitle');

            $table->string('cafe_image')
                ->nullable()
                ->after('hero_image');

            $table->string('favorite_col1_image')
                ->nullable()
                ->after('favorite_col1_items');

            $table->string('favorite_col2_image')
                ->nullable()
                ->after('favorite_col2_items');

            $table->string('favorite_col3_image')
                ->nullable()
                ->after('favorite_col3_items');

        });
    }

    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {

            $table->dropColumn([
                'hero_image',
                'cafe_image',
                'favorite_col1_image',
                'favorite_col2_image',
                'favorite_col3_image',
            ]);

        });
    }
};