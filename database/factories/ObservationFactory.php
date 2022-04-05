<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
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
            'nombre'=>$this->faker->numberBetween(0,200),
            // 'abondance'=> $this->faker->randomFloat(2,0,100),
            // 'presence'=>Arr::random([true,false]),
            'zone'=>Str::random(1).$this->faker->numberBetween(0,9),
            'latitude'=>$this->faker->latitude(),
            'longitude'=>$this->faker->longitude(),
            'animal_id'=>$this->faker->numberBetween(1,100),
            // 'suivi_id'=>$this->faker->numberBetween(1,300),
            'suivi_id'=>1,
            'date'=>$this->faker->date()
        ];
    }
}
