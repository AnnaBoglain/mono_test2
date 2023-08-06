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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->unsignedBigInteger('value');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');

            $table->softDeletes();
            $table->index('user_id', 'feedback_user_idx');
            $table->foreign('user_id', 'feedback_user_fk')->on('users')->references('id')->onDelete('cascade');

            $table->index('product_id', 'feedback_product_idx');
            $table->foreign('product_id', 'feedback_product_fk')->on('products')->references('id')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
