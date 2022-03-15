<?php

namespace Database\Factories;

use App\Models\NomVernaculaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class NomVernaculaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NomVernaculaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->firstNameMale
        ];
    }
}
