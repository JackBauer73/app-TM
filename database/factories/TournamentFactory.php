<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $debut = $this->faker->dateTimeBetween('2022-01-01','+1 year');
        $fin = $this->faker->dateTimeBetween($debut, $debut->format('Y-m-d') . ' +4 days');
        $inscrit_debut = $this->faker->dateTimeBetween('2022-01-01', $debut);
        $inscrit_fin = $this->faker->dateTimeBetween($inscrit_debut, $debut);

        return [
            'visible' => $this->faker->numberBetween(0, 1),
            'name' => $this->faker->lexify('Tournoi ??????'),
            'debut' => $debut,
            'fin' => $fin,
            'inscrit_debut' => $inscrit_debut,
            'inscrit_fin' => $inscrit_fin,
            'type_tournament' => $this->faker->numberBetween(0, 3),
            'max_simple' => $this->faker->numberBetween(0, 3),
            'max_double' => $this->faker->numberBetween(0, 3),
            'poster' => $this->faker->imageUrl(640, 480),
            'user_id' => $this->faker->numberBetween(1, 2),

        ];
    }
}
