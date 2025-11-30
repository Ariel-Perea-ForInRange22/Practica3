<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar la base de datos antes de sembrar
        $this->command->info('🗑️ Limpiando base de datos...');
        Appointment::query()->delete();
        Doctor::query()->delete();
        Patient::query()->delete();
        Specialty::query()->delete();

        $this->command->info('🏥 Sembrando especialidades médicas...');
        // Crear 6 especialidades reales
        Specialty::factory()->count(6)->create();
        $this->command->info('✅ 6 especialidades creadas');

        $this->command->info('👨‍⚕️ Sembrando doctores...');
        // Crear 25 doctores con nombres reales
        Doctor::factory()->count(25)->create();
        $this->command->info('✅ 25 doctores creados');

        $this->command->info('🧑‍🤝‍🧑 Sembrando pacientes...');
        // Crear 80 pacientes
        Patient::factory()->count(80)->create();
        $this->command->info('✅ 80 pacientes creados');

        $this->command->info('📅 Sembrando citas médicas...');
        // Crear 150 citas en horarios hábiles
        Appointment::factory()->count(150)->create();
        $this->command->info('✅ 150 citas médicas creadas');

        $this->command->info('');
        $this->command->info('🎉 ¡Base de datos sembrada exitosamente!');
        $this->command->info('');
        $this->command->info('📊 Resumen:');
        $this->command->info('   - Especialidades: ' . Specialty::count());
        $this->command->info('   - Doctores: ' . Doctor::count());
        $this->command->info('   - Pacientes: ' . Patient::count());
        $this->command->info('   - Citas: ' . Appointment::count());
    }
}
