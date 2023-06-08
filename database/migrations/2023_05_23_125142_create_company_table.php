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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->integer('comission_percentage')->nullable();

            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->integer('shift')->nullable();
            $table->text('shift_timing')->nullable();

            $table->text('cancel_policy')->nullable();
            $table->text('terms_condition')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company', function(Blueprint $table){
            $table->dropForeign('user_id');
        });
    }
};
