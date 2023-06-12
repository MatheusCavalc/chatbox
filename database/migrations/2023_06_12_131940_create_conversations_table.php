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
        Schema::create('conversations', function (Blueprint $table) {
            #conversation id
            $table->id();

            #user 1
            $table->unsignedBigInteger('user_1');
            $table->foreign('user_1')->references('id')->on('users');

            #user 2
            $table->unsignedBigInteger('user_2');
            $table->foreign('user_2')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
