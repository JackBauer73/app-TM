<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tournament;
use App\Models\Tableau;
use App\Models\User;



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
       Tournament::factory(10)->create();
       Tableau::factory(40)->create();
       User::factory(1)->create([
        'role'=>'Club',
        'name'=>'UMS PONTAULT',
        'email'=>'vandamme.vince73@gmail.com',
        'password' =>'test1234'
       ]);
       User::factory(1)->create([
        'role'=>'Club',
        'name'=>'CHELLES TT',
        'email'=>'vandamme@gmail.com',
        'password' =>'test1234'
       ]);



    }
}
