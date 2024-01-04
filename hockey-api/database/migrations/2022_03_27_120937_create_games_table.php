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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->json('metadata')->nullable();
            $table->string('status')->nullable(); // [ UPCOMING, COMPLETED, POSTPONED ] 
            $table->string('scoreType')->nullable(); // [ FT, OT, SO, FF]
            $table->datetime('time')->nullable();
            $table->string('venueName')->nullable();
            $table->string('venueAddress')->nullable();
            $table->integer('homeTeamScore')->nullable();
            $table->integer('visitingTeamScore')->nullable();
            $table->integer('homeTeamScoreSo')->nullable();
            $table->integer('visitingTeamScoreSo')->nullable();
            $table->foreignId('season_id')->constrained();
            $table->foreignId('home_team_id')->constrained('teams');
            $table->foreignId('away_team_id')->constrained('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
