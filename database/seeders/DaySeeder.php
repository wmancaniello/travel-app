<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Day;
use App\Models\Trip;
use faker\Factory as faker;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Recupero tutti i viaggi creati
        $trips = trip::all();

        foreach ($trips as $trip) {
            // Creo 5 giornate
            for ($i = 0; $i < 5; $i++) {
                Day::create([
                    'trip_id' => $trip->id,
                    'date' => $faker->date()
                ]);
            }
        }
    }
}
