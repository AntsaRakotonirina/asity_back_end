<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'aireProteger' => $this->faker->city(),
            'pays' => $this->faker->country(),
            'abreviation' => Str::random(3),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude()
        ];
    }
}
