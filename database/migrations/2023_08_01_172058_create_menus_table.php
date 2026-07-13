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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('waiting_time');
            $table->string('description');
            $table->string('qty')->nullable();
            $table->string('stock_alert')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('status')->default(0)->comment('0=>pending,1=approved,3=unavailable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};