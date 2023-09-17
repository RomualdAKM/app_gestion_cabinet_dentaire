<?php

namespace Database\Factories;

use App\Models\Acte;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'prix' => $this->faker->randomFloat(2, 1, 1000),
            'acte_id' => Acte::all()->random()->id,
        ];
    }
}
