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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('title');
            $table->string('country');
            $table->string('city');
            $table->string('location')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->text('category')->nullable();
            $table->text('sub_category')->nullable();
            $table->text('featured_image')->nullable();
            $table->text('description')->nullable();
            $table->text('highlights')->nullable();
            $table->text('inclusions')->nullable();
            $table->text('cancel_policy')->nullable();
            $table->string('age_group');
            $table->integer('show_in_homepage')->unsigned()->default(0);
            $table->string('duration')->nullable();
            $table->float('commission_percentage')->nullable();
            $table->float('price_weekday')->nullable();
            $table->float('price_weekend')->nullable();
            $table->integer('tickets_per_time_slot')->nullable();
            $table->time('opening_hour')->nullable();
            $table->time('closing_hour')->nullable();
            $table->integer('approved')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(0);
            $table->text('rejection_message')->nullable();
            $table->timestamp('last_edited')->nullable();
            $table->timestamp('added_on')->nullable();
            $table->integer('added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
