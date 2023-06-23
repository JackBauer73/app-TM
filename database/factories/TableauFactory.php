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
            'nom_tableau' => $this->faker->lexify('Tableau ??'),
            'max_joueurs' => $this->faker->numberBetween(10, 72),
            'prix_tournoi' => $this->faker->numberBetween(5, 10),
            'heure' => $this->faker->time('H:i:s'),
            'date' => $this->faker->dateTimeBetween($debut, $fin)->format('Y-m-d'),
            'points_mini' => $points_mini,
            'points_max' => $this->faker->numberBetween(599, 2599),
            'type_tableau' => $this->faker->numberBetween(0, 1),
            'visible_tab' => $this->faker->numberBetween(0, 1),
            'colors' => $this->faker->hexColor,
            'tournament_id' => $tournament->id,
        ];
    }
}
