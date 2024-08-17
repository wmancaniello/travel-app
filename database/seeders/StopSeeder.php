<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stop;
use App\Models\Day;
use Faker\factory as Faker;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Recupero tutte le giornate create
        $days = Day::all();
        foreach ($days as $day) {
            // Creo 3 fermate
            for ($i = 0; $i < 3; $i++) {
                Stop::create([
                    'day_id' => $day->id,
                    'title' => $faker->sentence(2),
                    'description' => $faker->paragraph,
                    'food' => $faker->word,
                    'curiosity' => $faker->sentence
                ]);
            }
        }
    }
}
