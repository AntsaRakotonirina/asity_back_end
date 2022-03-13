<?php

namespace Database\Seeders;

use App\Models\Localisation;
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
            SuiviSeeder::class,
            ObservationSeeder::class,
            ParticipationSeeder::class,
            LocalisationSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
    }
}
