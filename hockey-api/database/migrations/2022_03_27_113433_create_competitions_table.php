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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->text('nickname')->nullable();
            $table->text('description')->nullable();
            $table->string('logoUrl')->nullable();
            $table->json('gameTypes')->nullable();
            $table->json('rostersMetadata')->nullable();
            $table->json('rosterPlayerMetadata')->nullable();
            $table->json('gameMetadata')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
};
