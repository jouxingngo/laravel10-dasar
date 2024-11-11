<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessResult;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $schoolClassId = SchoolClass::all()->random()->id;
        $faker = FakerFactory::create();
        return [
            'name' => $faker->name(),
            'nis' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'gender' => fake()->randomElement(['male', 'female']),
            'school_class_id' => $schoolClassId,
        ];
    }
}
