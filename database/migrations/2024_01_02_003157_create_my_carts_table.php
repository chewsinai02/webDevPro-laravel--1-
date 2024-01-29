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
        Schema::create('my_carts', function (Blueprint $table) {
            $table->id();
            $table->string('foodID');
            $table->string('quantity');
            $table->string('userID');
            $table->string('dateAdd');
            $table->string('orderID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_carts');
    }
};
