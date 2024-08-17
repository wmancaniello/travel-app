<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Viaggio
        $this->call(TripSeeder::class);
        // Giornata
        $this->call(DaySeeder::class);
        // Tappe
        $this->call(StopSeeder::class);
        // Immagini
        $this->call(ImageSeeder::class);
        // Recensioni
        $this->call(RatingSeeder::class);
    }
}
