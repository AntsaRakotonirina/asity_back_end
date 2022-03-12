<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ScientifiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $specialites=[
            '',
            'Botanique',
            'Amphibien',
        ];
        return [
            'email'=>$this->faker->safeEmail(),
            'nom'=>$this->faker->firstName(),
            'prenom'=>$this->faker->lastName(),
            'specialite'=>Arr::random($specialites),
            'telephone'=>$this->faker->phoneNumber()
        ];
    }
}
