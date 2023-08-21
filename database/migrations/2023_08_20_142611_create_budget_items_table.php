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
        Schema::create('budget_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('budget_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->integer('qty');
            $table->double('custom_price')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('budget_id')->references('id')->on('budgets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_items');
    }
};
