<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Restaurant;
use App\Models\User;
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

        // $restaurant = Restaurant::create([
        //     'name' => 'McDonalds',
        //     'address' => 'Deligradska 5',
        //     'email' => 'mc@gmail.com',
        //     'password' => 'mc123'
        // ]);
        // Item::create([
        //     'name' => 'BigMac',
        //     'price' => 450,
        //     'restaurant_id' => $restaurant->id
        // ]);
        // User::create([
        //     'first_name' => 'Mirko',
        //     'last_name' => 'Mimic',
        //     'address' => 'address1',
        //     'email' => 'mirko@gmail.com',
        //     'password' => 'mirko123'
        // ]);

        User::factory()->count(10)->create();
        Restaurant::factory()->count(10)->create();
        Item::factory()->count(20)->create();
    }
}
