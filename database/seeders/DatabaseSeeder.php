<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\PriceRange;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1000)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'demo@gmail.com',
            'password' => Hash::make('password'),
        ]);


        Genre::create([
            'name' =>'Fiction',
        ]);
        Genre::create([
            'name' =>'Non Fiction',
        ]);
        Genre::create([
            'name' =>'SCI fic',
        ]);
      
        PriceRange::create([
            'price' =>'< $10',
        ]);
        PriceRange::create([
            'price' =>'$10 - $20',
        ]);
        PriceRange::create([
            'price' =>'$20 - $30',
        ]);
      
        PriceRange::create([
            'price' =>'>$30',
        ]);
      
    }
}
