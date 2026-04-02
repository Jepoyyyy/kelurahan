<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemohon>
 */
class PemohonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $status = fake()->randomElement(['Belum Menikah', 'Menikah']);

    return [
        'nama' => fake()->name(),
        'nik' => fake()->unique()->numerify('################'),
        'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),

        'tempat_lahir' => fake()->city(),
        'tanggal_lahir' => fake()->date(),
        'kewarganegaraan' => 'Indonesia',
        'agama' => fake()->randomElement(['Islam', 'Kristen', 'Hindu']),
        'pekerjaan' => fake()->jobTitle(),

        'alamat' => fake()->address(),
        'rt' => fake()->numerify('###'),

        'status' => $status,

        'beristri_ke' => $status === 'Menikah'
            ? fake()->numberBetween(1, 3)
            : null,

        'nama_partner_sebelumnya' => $status === 'Menikah'
            ? fake()->optional()->name()
            : null,
    ];
}
}
