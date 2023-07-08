<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::where('role', 'Club')->pluck('id')->toArray();

        return [
            'num_club' => sprintf('0%d', $this->faker->numberBetween(8000000, 8999999)),
            'name' => $this->faker->numberBetween(10, 72),
            'users_id' => $this->faker->randomElement($userIds),
        ];
    }
}
