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
         // Call the CustomerSeeder to seed the customers and their associated data
        $this->call([
            CustomerSeeder::class
        ]);
    }
}
