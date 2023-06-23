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
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->boolean('visible')->default(false);
            $table->dateTime('debut');
            $table->dateTime('fin');
            $table->dateTime('inscrit_debut');
            $table->dateTime('inscrit_fin');
            $table->integer('type_tournament');
            $table->integer('max_simple');
            $table->integer('max_double');
            $table->text('poster')->nullable();
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
