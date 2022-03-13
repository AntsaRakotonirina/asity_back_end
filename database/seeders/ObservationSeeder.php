<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Observation::factory(100)->create();
    }
}
