<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friend>
 */
class FriendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'telefono' => $this->faker->unique()->e164PhoneNumber(),
            'direccion' => $this->faker->address(),
            'correo' => $this->faker->unique()->safeEmail(),
        ];
    }
}
