<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Miembro>
 */
class MiembroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre" => $this->faker->name,
            "apellido" => $this->faker->lastname,
            "direccion" => $this->faker->address,
            "telefono" => "3813452278",
            "fecha_nacimiento" => "2000-05-06",
            "genero" => $this->faker->randomElement(["masculino", "femenino"]),
            "email" => $this->faker->unique()->safeEmail,
            "estado" => "1",
            "ministerio" => "pastoral",
            "fecha_ingreso" => "2023/11/02"
        ];
    }
}
