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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name',100);
            $table->string('item_description');
            $table->string('unit',30);
            $table->double('regular_price');
            $table->bigInteger('category_id')->unsigned();

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
