<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_statistics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('game_player_id')->constrained()->cascadeOnDelete();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('g')->nullable();
            $table->tinyInteger('a')->nullable();
            $table->tinyInteger('ppg')->nullable();
            $table->tinyInteger('shg')->nullable();
            $table->smallInteger('pim')->nullable();
            $table->tinyInteger('mins')->nullable();
            $table->smallInteger('shots')->nullable();
            $table->tinyInteger('ga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_statistics');
    }
};
