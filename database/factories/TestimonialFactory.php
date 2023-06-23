<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'      => $this->faker->name(),
            'position'  => str_replace(".","",$this->faker->sentence(2)),
            'review'    => $this->faker->text(100),
        ];
    }
}