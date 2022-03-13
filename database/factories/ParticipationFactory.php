<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'suivi_id'=>$this->faker->random_int(1,30),
            'scientifique_id'=>$this->faker->random_int(1,100)
        ];
    }
}
