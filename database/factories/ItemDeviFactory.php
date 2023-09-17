<?php

namespace Database\Factories;

use App\Models\Acte;
use App\Models\Code;
use App\Models\Devi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemDevi>
 */
class ItemDeviFactory extends Factory
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
            'devi_id' => Devi::all()->random()->id,
        ];
    }
}
