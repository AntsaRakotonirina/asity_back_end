<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ObservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->numberBetween(0,1000),
            'zone'=>Str::random(1).$this->faker->numberBetween(0,9),
            'latitude'=>$this->faker->latitude(),
            'longitude'=>$this->faker->longitude(),
            'animal_id'=>$this->faker->numberBetween(1,100),
            'suivi_id'=>$this->faker->numberBetween(1,30),
            'date'=>$this->faker->date()
        ];
    }
}
