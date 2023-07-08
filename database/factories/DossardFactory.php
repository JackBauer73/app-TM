<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tournament;
use App\Models\Player;
use App\Models\Dossard;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class DossardFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        // $faker = Factory::create();

        // // $factory->define(Dossard::class, function (Faker $faker) {
        // $tournamentIds = Tournament::pluck('id')->toArray();
        // $playerIds = Player::pluck('id')->toArray();

        // // Obtenir un tournoi et un joueur aléatoires
        // $tournament = Tournament::find($this->faker->randomElement($tournamentIds));
        // $player = Player::find($this->faker->randomElement($playerIds));

        // // Vérifier si un dossard avec le même tournoi et joueur existe déjà
        // $existingDossard = Dossard::where('tournaments_id', $tournament->id)
        //     ->where('players_id', $player->id)
        //     ->first();

        // // Générer un numéro de dossard unique pour le tournoi
        // $numDossard = $this->faker->unique()->numberBetween(1, 500);

        // // Vérifier si le numéro de dossard est déjà utilisé pour ce tournoi
        // while ($existingDossard && $existingDossard->num_dossard === $numDossard) {
        //     $numDossard = $this->faker->unique()->numberBetween(1, 500);
        // }

        // return [
        //     'tournaments_id' => $tournament->id,
        //     'players_id' => $player->id,
        //     'num_dossard' => $numDossard,
        //     'etat' => 0
        // ];
    }
}
