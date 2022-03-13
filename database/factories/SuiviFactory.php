<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuiviFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'default_date'=>$this->faker->date()
        ];
    }
}
