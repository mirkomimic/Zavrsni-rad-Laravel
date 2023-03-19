<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $restaurant = Restaurant::create([
            'name' => 'McDonalds',
            'address' => 'Deligradska 5',
            'email' => 'mc@gmail.com',
            'password' => 'mc123'
        ]);
        Item::create([
            'name' => 'BigMac',
            'price' => 450,
            'restaurant_id' => $restaurant->id
        ]);
    }
}