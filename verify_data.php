<?php
// Script para verificar datos con Tinker

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== VERIFICACIÓN DE DATOS SEMBRADOS ===" . PHP_EOL . PHP_EOL;

// Conteo de registros
echo "📊 CONTEO DE REGISTROS:" . PHP_EOL;
echo "   Especialidades: " . \App\Models\Specialty::count() . PHP_EOL;
echo "   Doctores: " . \App\Models\Doctor::count() . PHP_EOL;
echo "   Pacientes: " . \App\Models\Patient::count() . PHP_EOL;
echo "   Citas: " . \App\Models\Appointment::count() . PHP_EOL;
echo PHP_EOL;

// Mostrar 5 doctores con especialidades
echo "👨‍⚕️ PRIMEROS 5 DOCTORES CON ESPECIALIDADES:" . PHP_EOL;
$doctors = \App\Models\Doctor::with('specialty')->take(5)->get();
foreach($doctors as $doctor) {
    echo sprintf(
        "   Dr. %s %s - %s (Tel: %s)" . PHP_EOL,
        $doctor->name,
        $doctor->lastname,
        $doctor->specialty->name,
        $doctor->phone
    );
}
echo PHP_EOL;

// Mostrar todas las especialidades
echo "🏥 ESPECIALIDADES MÉDICAS:" . PHP_EOL;
$specialties = \App\Models\Specialty::all();
foreach($specialties as $specialty) {
    $doctorCount = $specialty->doctors()->count();
    echo sprintf("   - %s (%d doctores)" . PHP_EOL, $specialty->name, $doctorCount);
}
echo PHP_EOL;

// Mostrar 3 citas de ejemplo
echo "📅 EJEMPLOS DE CITAS:" . PHP_EOL;
$appointments = \App\Models\Appointment::with(['patient', 'doctor.specialty'])->take(3)->get();
foreach($appointments as $apt) {
    echo sprintf(
        "   %s - Paciente: %s %s → Dr. %s %s (%s) - Estado: %s" . PHP_EOL,
        $apt->scheduled_at->format('Y-m-d H:i'),
        $apt->patient->name,
        $apt->patient->lastname,
        $apt->doctor->name,
        $apt->doctor->lastname,
        $apt->doctor->specialty->name,
        $apt->status
    );
}
