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
        Schema::create('tableaus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained('tournaments');
            $table->string('nom_tableau');
            $table->integer('max_joueurs');
            $table->decimal('prix_tournoi');
            $table->time('heure');
            $table->date('date');
            $table->integer('points_mini');
            $table->integer('points_max');
            $table->string('type_tableau');
            $table->boolean('visible_tab');
            $table->string('colors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tableaus');
    }
};
