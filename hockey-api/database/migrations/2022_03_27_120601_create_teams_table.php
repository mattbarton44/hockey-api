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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->text('description')->nullable();
            $table->string('logoUrl')->nullable();
            $table->string('venueName')->nullable();
            $table->string('venueAddress')->nullable();
            $table->string('primaryColour')->nullable();
            $table->string('secondaryColour')->nullable();
            $table->foreignId('club_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
