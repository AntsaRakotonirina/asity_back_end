<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Participation::factory(5)->create();
    }
}
