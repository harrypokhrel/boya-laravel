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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->nullable();
            $table->string('activity_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('No_of_tickets')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('image')->nullable();
            $table->time('time')->nullable();
            $table->string('note')->nullable();
            $table->string('payment_note')->nullable();
            $table->date('date')->nullable()->default(date('Y-m-d'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
