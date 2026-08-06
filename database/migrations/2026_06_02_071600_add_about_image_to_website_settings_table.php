<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('website_settings', function ($table) {

        $table->string('about_image')
              ->nullable()
              ->after('about_description');

    });
}

public function down()
{
    Schema::table('website_settings', function ($table) {

        $table->dropColumn('about_image');

    });
}
};
