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
        Schema::create('dossards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournaments_id')->constrained('tournaments');
            $table->foreignId('players_id')->constrained('players');
            $table->integer('num_dossard');
            $table->boolean('etat')->default(false); // Champ "état" pour indiquer si le dossard est supprimé
            $table->timestamps();
            $table->unique(['tournaments_id', 'players_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossards');
    }
};
