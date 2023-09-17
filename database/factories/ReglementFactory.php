<?php

namespace Database\Factories;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reglement>
 */
class ReglementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'montant_verse' => fake()->randomFloat(2, 1, 1000), 
            'montant_restant' => fake()->randomFloat(2, 1, 1000), 
            'date' => fake()->date(),
            'facture_id' => Facture::all()->random()->id,
        ];
    }
}
