<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $maleNames = ['Carlos', 'José', 'Luis', 'Miguel', 'Juan', 'Pedro', 'Francisco', 'Antonio', 'Manuel', 'Ricardo', 'Fernando', 'Roberto', 'Javier', 'Daniel', 'Alejandro', 'Diego', 'Sergio', 'Jorge', 'Raúl', 'Andrés'];
        $femaleNames = ['María', 'Ana', 'Carmen', 'Laura', 'Patricia', 'Rosa', 'Elena', 'Isabel', 'Sofía', 'Lucía', 'Gabriela', 'Daniela', 'Andrea', 'Claudia', 'Beatriz', 'Mónica', 'Teresa', 'Mariana', 'Adriana', 'Valeria'];
        $lastnames = ['García', 'Rodríguez', 'Martínez', 'López', 'González', 'Hernández', 'Pérez', 'Sánchez', 'Ramírez', 'Torres', 'Flores', 'Rivera', 'Gómez', 'Díaz', 'Cruz', 'Morales', 'Jiménez', 'Ruiz', 'Mendoza', 'Castillo', 'Reyes', 'Ortiz', 'Gutiérrez', 'Chávez', 'Vargas'];

        $isMale = $this->faker->boolean();
        $name = $isMale ? $this->faker->randomElement($maleNames) : $this->faker->randomElement($femaleNames);
        $lastname = $this->faker->randomElement($lastnames) . ' ' . $this->faker->randomElement($lastnames);

        return [
            'name' => $name,
            'lastname' => $lastname,
            'phone' => $this->faker->numerify('55########'), // Formato México: 55 + 8 dígitos
            'email' => $this->faker->unique()->userName() . '@' . $this->faker->randomElement(['gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com']),
            'date_of_birth' => $this->faker->dateTimeBetween('-80 years', '-1 year')->format('Y-m-d'),
        ];
    }
}
