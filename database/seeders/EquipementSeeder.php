<?php

namespace Database\Seeders;

use App\Models\Equipements;
use Illuminate\Database\Seeder;

class EquipementSeeder extends Seeder
{
    public function run()
    {
        Equipements::factory(10)->create();
    }
}
