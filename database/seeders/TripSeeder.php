<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
// Faker
use Faker\Factory as Faker;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Creo 5 viaggi
        for ($i = 0; $i < 5; $i++) {
            Trip::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'start_date' => $faker->date('Y-m-d'),
                'end_date' => $faker->date('Y-m-d'),
            ]);
        }
    }
}
