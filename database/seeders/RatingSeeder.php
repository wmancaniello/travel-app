<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use App\Models\Stop;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Recupero delle tappe create
        $stops = Stop::all();
        // Creo 2 recensioni per ogni tappa
        foreach ($stops as $stop) {
            for ($i = 0; $i < 2; $i++) {
                Rating::create([
                    'stop_id' => $stop->id,
                    'score' => $faker->numberBetween(1, 5),
                    'comment' => $faker->sentence
                ]);
            }
        }
    }
}
