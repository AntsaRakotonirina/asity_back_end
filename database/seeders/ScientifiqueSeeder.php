<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ScientifiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Scientifique::factory(50)->create();
    }
}
