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
        Schema::create('products_in', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_cards_id')->constrained()->restrictOnDelete();
            $table->string('product_name');
            $table->integer('input_amount');
            $table->string('total_amount');
            $table->date('input_date');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_ins');
    }
};
