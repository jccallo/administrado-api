<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Call>
 */
class CallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'estado_respuesta' => $this->faker->randomElement([2, 1, 0]),
            'status' => $this->faker->randomElement([1, 0]),
            'friend_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}
