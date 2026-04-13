<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function Illuminate\Support\years;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'tanggal' => $this->faker->dateTimeBetween('now','
            +1 years')->format('Y-m-d'),
            'jenis' => $this->faker->randomElement(['umum', 'rt', 'kelurahan', 'kecamatan']),
            'lokasi' => $this->faker->address(),
        ];
    }
}
