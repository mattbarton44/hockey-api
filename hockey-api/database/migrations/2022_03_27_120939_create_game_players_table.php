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
        Schema::create('game_players', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->softDeletes();
          $table->foreignId('roster_player_id')->constrained()->cascadeOnDelete();
          $table->foreignId('game_id')->constrained()->cascadeOnDelete();
          $table->boolean('isCaptain')->nullable();
          $table->boolean('isAssistant')->nullable();
          $table->boolean('isNetminder')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_players');
    }
};
