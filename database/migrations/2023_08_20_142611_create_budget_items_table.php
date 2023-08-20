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
            $table->integer('qty');
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->foreign('category_id')->references('id')->on('categories');
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
