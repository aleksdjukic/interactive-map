<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PraceniPredmetKorupcije;

class PraceniPredmetKorupcijeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PraceniPredmetKorupcije::factory()
            ->count(50)
            ->create();
    }
}
