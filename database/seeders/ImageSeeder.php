<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Image;
use App\Models\Stop;
use Faker\Factory as Faker;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // recupero delle tappe create
        $stops = Stop::all();

        foreach ($stops as $stop) {
            // Creo 3 immagini per ogni tappa
            for ($i=0; $i < 3; $i++) { 
                Image::create([
                    'stop_id' => $stop->id,
                    'url' => $faker->imageUrl(640, 480, 'nature, true')
                ]);
            }
        }
    }
}
