<?php

namespace Database\Factories;

use App\Models\Cat;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


class CatFactory extends Factory
{

    protected $model = Cat::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->firstName,
            "color" => $this->faker->hexColor,
            "departement" => $this->faker->numberBetween(1, 97),
            "birthday" => $this->faker->date(),
            "is_lost" => $this->faker->boolean,
            "user_id" => User::factory()
        ];
    }
}
