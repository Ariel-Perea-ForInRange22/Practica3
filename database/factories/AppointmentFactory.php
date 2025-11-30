<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar una fecha aleatoria en los próximos 45 días
        $daysAhead = $this->faker->numberBetween(0, 45);
        $date = Carbon::now()->addDays($daysAhead);

        // Asegurarse de que sea un día hábil (lunes a sábado)
        while ($date->isSunday()) {
            $date->addDay();
        }

        // Generar hora aleatoria entre 8:00 y 19:00 en intervalos de 30 minutos
        $possibleHours = [];
        for ($hour = 8; $hour < 19; $hour++) {
            $possibleHours[] = sprintf('%02d:00:00', $hour);
            $possibleHours[] = sprintf('%02d:30:00', $hour);
        }

        $time = $this->faker->randomElement($possibleHours);
        $scheduledAt = Carbon::parse($date->format('Y-m-d') . ' ' . $time);

        return [
            'patient_id' => Patient::inRandomOrder()->first()->id,
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'scheduled_at' => $scheduledAt,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
            'notes' => $this->faker->boolean(70) ? $this->faker->sentence() : null,
        ];
    }
}
