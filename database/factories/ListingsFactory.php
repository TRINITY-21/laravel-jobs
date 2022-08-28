<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {



        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'website' => $this->faker->sentence(),
            'company' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'tags' => 'laravel,vue,backend',
            'location' => $this->faker->city(),

        ];
    }
}