<?php

namespace Database\Seeders;

use App\Models\Scientifique;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AnimalSeeder::class,
            ScientifiqueSeeder::class,
            SiteParentSeeder::class,
            SuiviSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
    }
}
