<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $maleNames = ['Carlos', 'José', 'Luis', 'Miguel', 'Juan', 'Pedro', 'Francisco', 'Antonio', 'Manuel', 'Ricardo', 'Fernando', 'Roberto', 'Javier', 'Daniel', 'Alejandro'];
        $femaleNames = ['María', 'Ana', 'Carmen', 'Laura', 'Patricia', 'Rosa', 'Elena', 'Isabel', 'Sofía', 'Lucía', 'Gabriela', 'Daniela', 'Andrea', 'Claudia', 'Beatriz'];
        $lastnames = ['García', 'Rodríguez', 'Martínez', 'López', 'González', 'Hernández', 'Pérez', 'Sánchez', 'Ramírez', 'Torres', 'Flores', 'Rivera', 'Gómez', 'Díaz', 'Cruz', 'Morales', 'Jiménez', 'Ruiz', 'Mendoza', 'Castillo'];

        $isMale = $this->faker->boolean();
        $name = $isMale ? $this->faker->randomElement($maleNames) : $this->faker->randomElement($femaleNames);
        $lastname = $this->faker->randomElement($lastnames) . ' ' . $this->faker->randomElement($lastnames);

        return [
            'name' => $name,
            'lastname' => $lastname,
            'phone' => $this->faker->numerify('55########'), // Formato México: 55 + 8 dígitos
            'specialty_id' => Specialty::inRandomOrder()->first()->id,
        ];
    }
}
