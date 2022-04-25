<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\NomCommun;
use App\Models\NomVernaculaire;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animal::factory(100)
        ->has(NomCommun::factory(3))
        ->has(NomVernaculaire::factory(3))
        ->create();

        $animals = Animal::all();
        foreach($animals as $animal){
            $sciname = $animal->nomScientifiques()->first();
            $animal->curent_name_id = $sciname->id;
            $animal->save();
        }
    }
}
