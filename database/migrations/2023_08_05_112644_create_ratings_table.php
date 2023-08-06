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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('estimation');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('feedback_id')->nullable();

            $table->softDeletes();
            $table->index('user_id', 'ratings_user_idx');
            $table->foreign('user_id', 'ratings_user_fk')->on('users')->references('id')->onDelete('cascade');

            $table->index('product_id', 'ratings_product_idx');
            $table->foreign('product_id', 'ratings_product_fk')->on('products')->references('id')->onDelete('cascade');

            $table->index('feedback_id', 'ratings_feedback_idx');
            $table->foreign('feedback_id', 'ratings_feedback_fk')->on('feedback')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
