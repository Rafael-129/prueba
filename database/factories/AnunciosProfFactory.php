<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnunciosProf>
 */
class AnunciosProfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '',
            'fechapub' => $this->faker->date(),
            'fechaev' => $this->faker->date(),
            'lugar' => $this->faker->word(),
            'detalle' => $this->faker->word(),

        ];
    }
}
