<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tournament;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tableau>
 */
class TableauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $points_mini = 500;
        $tournamentIds = Tournament::pluck('id')->toArray();

        $tournament = Tournament::find($this->faker->randomElement($tournamentIds));
        $debut = $tournament->debut;
        $fin = $tournament->fin;

        return [
            'nom_tableau' => $this->faker->lexify('T ??'),
            'max_players' => $this->faker->numberBetween(10, 72),
            'price' => $this->faker->numberBetween(5, 10),
            'hours' => $this->faker->time('H:i'),
            'date' => $this->faker->dateTimeBetween($debut, $fin)->format('Y-m-d'),
            'points_mini' => $points_mini,
            'points_max' => $this->faker->numberBetween(599, 2599),
            'type_tableau' => $this->faker->numberBetween(0, 1),
            'visible' => $this->faker->numberBetween(0, 1),
            'colors' => $this->faker->hexColor,
            'etat' => 0,
            'tournaments_id' => $tournament->id,
        ];
    }
}
