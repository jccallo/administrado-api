<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postulation>
 */
class PostulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'estado_postulacion' => $this->faker->randomElement(['aceptado', 'pendiente', 'rechazado']),
            'status' => $this->faker->randomElement(['activo', 'inactivo']),
            'vacancy_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
