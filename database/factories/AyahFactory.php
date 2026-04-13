<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ayah>
 */
class AyahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nama' => fake()->name(),
        'namaayah' => fake()->name(),
        'nik' => fake()->unique()->numerify('################'),
        'tempat_lahir' => fake()->city(),
        'tanggal_lahir' => fake()->date(),
        'kewarganegaraan' => 'Indonesia',
        'agama' => fake()->randomElement(['Islam', 'Kristen', 'Hindu']),
        'pekerjaan' => fake()->jobTitle(),
        'alamat' => fake()->address(),
    ];
}
}
