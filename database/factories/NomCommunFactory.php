<?php

namespace Database\Factories;

use App\Models\NomCommun;
use Illuminate\Database\Eloquent\Factories\Factory;

class NomCommunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NomCommun::class;

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
