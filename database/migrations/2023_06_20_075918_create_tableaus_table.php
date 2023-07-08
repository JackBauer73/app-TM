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
            $table->foreignId('tournaments_id')->constrained('tournaments');
            $table->string('nom_tableau', 50);
            $table->boolean('visible');
            $table->date('date');
            $table->time('hours');
            $table->decimal('price');
            $table->integer('max_players');
            $table->string('type_tableau', 50);
            $table->integer('points_mini')->default(500);
            $table->integer('points_max');
            $table->boolean('etat')->default(0);
            $table->string('colors', 25);
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
