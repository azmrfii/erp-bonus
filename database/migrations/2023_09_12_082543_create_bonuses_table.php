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
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('totalBonus');
            $table->bigInteger('percentage1');
            $table->bigInteger('percentage2');
            $table->bigInteger('percentage3');
            $table->bigInteger('bonus1');
            $table->bigInteger('bonus2');
            $table->bigInteger('bonus3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses');
    }
};
