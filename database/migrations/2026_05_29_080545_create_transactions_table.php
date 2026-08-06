<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('invoice')->unique();

            $table->string('customer_name')->nullable();

            $table->string('customer_phone')->nullable();

            $table->string('customer_email')->nullable();

            $table->decimal('total', 12, 2)->default(0);

            $table->string('payment_method')->nullable();

            $table->enum('status', [
                'pending',
                'paid',
                'cancelled'
            ])->default('pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};