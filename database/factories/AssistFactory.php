<?php

namespace Database\Factories;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assist>
 */
class AssistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentDni = Student::inRandomOrder()->first()->dni;

        return [
            'student_dni' => $studentDni,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
