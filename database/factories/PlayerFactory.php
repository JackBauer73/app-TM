<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::where('role', 'Player')->pluck('id')->toArray();
        $gender = $this->faker->randomElement(['male', 'female']);
        $firstName = $this->faker->firstName($gender);
        $lastName = $this->faker->lastName;
        $dateOfBirth = $this->faker->dateTimeBetween('-50 years', '-12 years')->format('Y-m-d');
        return [
            'num_licence' => $this->faker->numberBetween(8000000, 8999999),
            'name' => $lastName,
            'surname' => $firstName,
            'sexe' => $gender,
            'date_naissance' => $dateOfBirth,
            'pts_classement' => $this->faker->numberBetween(500, 2500),
            'users_id' => $this->faker->randomElement($userIds),
        ];
    }
}
