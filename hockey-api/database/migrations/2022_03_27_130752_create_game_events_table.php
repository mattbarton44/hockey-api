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
        Schema::create('game_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // goal, penalty, nm
            $table->time('time')->nullable();
            $table->foreignId('roster_id')->constrained()->cascadeOnDelete();

            // goal
            $table->unsignedBigInteger('goal')->nullable();
            $table->unsignedBigInteger('assist1')->nullable();
            $table->unsignedBigInteger('assist2')->nullable();
            
            // penalty
            $table->unsignedBigInteger('penalty_player')->nullable();
            $table->string('penalty_type')->nullable();
            $table->smallInteger('penalty_mins')->nullable();
            
            // nm
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
        Schema::dropIfExists('game_events');
    }
};
