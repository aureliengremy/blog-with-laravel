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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
//            $table->unsignedBigInteger('user_id'); // To be sure it's always gonna be a positive int number
            $table->text('body');
            $table->timestamps();

            // this is :
//            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            // SAME AS Tjis two lines :
//            $table->unsignedBigInteger('post_id'); // To be sure it's always gonna be a positive int number
//            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
