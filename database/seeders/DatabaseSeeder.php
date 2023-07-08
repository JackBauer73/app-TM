<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Club;
use App\Models\Dossard;
use App\Models\Player;
use App\Models\Tournament;
use App\Models\Tableau;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(1)->create([
            'role' => 'Club',
            'email' => 'vince73@gmail.com',
            'password' => 'test1234'
        ]);
        User::factory(1)->create([
            'role' => 'Club',
            'email' => 'vandamme@gmail.com',
            'password' => 'test1234'
        ]);
        User::factory(1)->create([
            'role' => 'Player',
            'email' => 'vandamme.vince73@gmail.com',
            'password' => 'test1234'
        ]);
        // User::factory(48)->create();
        Club::factory(1)->create([
            'num_club' => '08778555',
            'name' => 'CHELLES',
            'users_id' => 2
        ]);
        Club::factory(1)->create([
            'num_club' => '08771170',
            'name' => 'UMS PONTAULT',
            'users_id' => 1
        ]);
        Player::factory(1)->create([
            'num_licence' => '77330915',
            'name' => 'Vandamme',
            'surname' => 'Vincent',
            'sexe' => 'Masculin',
            // 'date_naissance' => '',
            'pts_classement' => 678,
            'users_id' => 3

        ]);

        // Player::factory(40)->create();
        Tournament::factory(5)->create();
        Tableau::factory(4)->create();
    }
}
