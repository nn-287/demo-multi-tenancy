<?php

namespace Database\Seeders;

use App\Models\Event;
use Faker\Factory as Faker;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Clear the table
        Event::truncate();

        // Insert 10 random events
        for ($i = 0; $i < 10; $i++) {
            Event::create([
                'title' => $faker->sentence(3),
                'start' => $faker->dateTimeBetween('now', '+1 month'),
                'end' => $faker->dateTimeBetween('+1 hour', '+2 months'),
            ]);
        }
    }
}
