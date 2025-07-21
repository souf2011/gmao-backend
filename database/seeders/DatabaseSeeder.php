<?php

namespace Database\Seeders;

use App\Models\Equipements;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'elhoucine@adm.com',
            'password' => bcrypt('12345678'),
        ]);
        $this->call([
            EmplacementsSeeder::class,
            CategoriesSeeder::class,
            EquipementSeeder::class,
            IntervenantSeeder::class,
            ServiceSeeder::class


        ]);
    }
}
