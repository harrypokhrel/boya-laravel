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

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->string('title');

            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->text('tag')->nullable();
            $table->text('category')->nullable();

            $table->string('featured_image')->nullable();
            $table->text('description')->nullable();
            $table->text('highlights')->nullable();
            $table->text('inclusions')->nullable();
            
            $table->string('age_group');
            $table->integer('show_in_homepage')->unsigned()->default(0);

            $table->string('duration')->nullable();
            $table->float('price_weekday')->nullable();
            $table->float('price_weekend')->nullable();
            
            $table->integer('enable_shift_price')->unsigned()->default(0);
            $table->string('shift_discount_type')->nullable();
            $table->string('shift_on_weekends')->nullable();
            $table->text('shift_price')->nullable();

            $table->integer('tickets_per_time_slot')->nullable();
            $table->time('opening_hour')->nullable();
            $table->time('closing_hour')->nullable();

            $table->integer('group_discount')->unsigned()->default(0);
            $table->string('discount_type')->nullable();
            $table->integer('discount_on_weekends')->unsigned()->default(0);
            $table->text('shift_discounts')->nullable();

            $table->integer('approved')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(0);
            $table->text('rejection_message')->nullable();

            $table->date('added_on')->nullable();
            $table->integer('added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities', function(Blueprint $table){
            $table->dropForeign('company_id');
        });
    }
};
