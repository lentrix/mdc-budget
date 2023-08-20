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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('procurement_plan_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->string('notes')->nullable();
            $table->string('status',15)->default('pending'); //pending, for revision, approved
            $table->timestamp('approved_at')->nullable();
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->timestamps();
            $table->unique(['procurement_plan_id','department_id']);
            $table->foreign('procurement_plan_id')->references('id')->on('procurement_plans');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
