<?php

namespace Database\Seeders;

use App\Models\Localisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        \App\Models\User::factory(5)->create();
        \App\Models\User::create([
            'name'=>'Admin',
            'isAdmin'=> true,
            'password' => Hash::make('admin')
        ]);
    }
}
