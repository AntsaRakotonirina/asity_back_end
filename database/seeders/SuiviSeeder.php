<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuiviSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Suivi::factory(30)->create();
    }
}
