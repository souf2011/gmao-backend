<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emplacements;

class EmplacementsSeeder extends Seeder
{
    public function run()
    {
        Emplacements::factory()->count(10)->create();
    }
}
