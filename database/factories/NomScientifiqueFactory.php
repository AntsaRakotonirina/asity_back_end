<?php

namespace Database\Factories;

use App\Models\NomScientifique;
use Illuminate\Database\Eloquent\Factories\Factory;

class NomScientifiqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NomScientifique::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->colorName(),
            'mis_a_jour'=>$this->faker->date()
        ];
    }
}
