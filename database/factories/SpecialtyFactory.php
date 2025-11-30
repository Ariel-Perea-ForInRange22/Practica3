<?php

namespace Database\Factories;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialty>
 */
class SpecialtyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specialties = [
            ['name' => 'Cardiología', 'description' => 'Especialidad médica que se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del aparato circulatorio.'],
            ['name' => 'Dermatología', 'description' => 'Especialidad médica dedicada al estudio de la estructura y función de la piel, así como de las enfermedades que la afectan.'],
            ['name' => 'Pediatría', 'description' => 'Rama de la medicina que se especializa en la salud y las enfermedades de los niños desde el nacimiento hasta la adolescencia.'],
            ['name' => 'Traumatología', 'description' => 'Especialidad médica y quirúrgica que se dedica al estudio de las lesiones del aparato locomotor.'],
            ['name' => 'Ginecología', 'description' => 'Especialidad médica que trata las enfermedades del sistema reproductor femenino.'],
            ['name' => 'Oftalmología', 'description' => 'Especialidad médica que estudia las enfermedades de ojo y su tratamiento, incluyendo el globo ocular y sus anexos.'],
        ];

        static $index = 0;
        $specialty = $specialties[$index % count($specialties)];
        $index++;

        return $specialty;
    }
}
