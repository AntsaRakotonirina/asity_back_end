<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocalisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_id'=>$this->faker->numberBetween(1,100),
            'suivi_id'=>$this->faker->numberBetween(1,30)
        ];
    }
}
