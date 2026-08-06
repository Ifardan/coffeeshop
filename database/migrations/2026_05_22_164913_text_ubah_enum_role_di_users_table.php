<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('users')) {
            DB::statement("
                ALTER TABLE users 
                MODIFY COLUMN role ENUM('owner', 'kasir', 'admin') NOT NULL
            ");
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('users')) {
            DB::statement("
                ALTER TABLE users 
                MODIFY COLUMN role ENUM('owner', 'kasir') NOT NULL
            ");
        }
    }
};