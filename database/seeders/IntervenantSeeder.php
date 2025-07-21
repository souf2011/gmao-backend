<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Intervenants;

class IntervenantSeeder extends Seeder
{
    public function run(): void
    {
        Intervenants::factory()->count(20)->create(); // insère 20 intervenants
    }
}
