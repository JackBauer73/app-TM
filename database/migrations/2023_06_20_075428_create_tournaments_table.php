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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clubs_id')->constrained('clubs');
            $table->string('name', 50);
            $table->boolean('visible');
            $table->datetime('debut');
            $table->datetime('fin');
            $table->datetime('inscrit_debut');
            $table->datetime('inscrit_fin');
            $table->string('type_tournament', 50);
            $table->integer('max_simple');
            $table->integer('max_double');
            $table->text('poster', 50);
            $table->boolean('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
