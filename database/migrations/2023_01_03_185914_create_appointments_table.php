<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('datetime');
            $table->string('location');
            $table->foreignId('user_id')->references('id')->on('users');
            // $table->foreignId('coach_id')->nullable()->constrained()->references('id')->on('coaches');
            $table->integer('coach_id');
            $table->integer('travel_time');
            $table->integer('duration');
            $table->integer('alert');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};