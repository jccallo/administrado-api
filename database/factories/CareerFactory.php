<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word(),
            'tipo_carrera' => $this->faker->randomElement(['universidad', 'instituto', 'otros']),
            'status' => $this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}
