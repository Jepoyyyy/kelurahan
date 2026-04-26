<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pemohon;
use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Pasangan;
use App\Models\Event;
use App\Models\news;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pemohon::factory(10)->create()->each(function ($pemohon) {

        Ayah::factory()->create([
            'pemohon_id' => $pemohon->id
        ]);

        Ibu::factory()->create([
            'pemohon_id' => $pemohon->id
        ]);

        Pasangan::factory()->create([
            'pemohon_id' => $pemohon->id
        ]);



    });
        Event::factory(10)->create();
        news::factory(10)->create();
    }
}
