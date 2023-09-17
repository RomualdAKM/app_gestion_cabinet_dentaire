<?php

namespace Database\Factories;

use App\Models\Acte;
use App\Models\Code;
use App\Models\Facture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemFacture>
 */
class ItemFactureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero_dent' => fake()->randomFloat(2, 1, 10),
            'acte_id' => Acte::all()->random()->id,
            'code_id' => Code::all()->random()->id,
            'facture_id' => Facture::all()->random()->id,
        ];
    }
}
