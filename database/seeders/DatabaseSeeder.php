<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'address' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true
        ]);
        User::create([
            'first_name' => 'Pera',
            'last_name' => 'Peric',
            'address' => 'address 333',
            'email' => 'pera@gmail.com',
            'password' => Hash::make('pera123'),
            'is_admin' => false
        ]);

        User::factory()->count(10)->create();
        Restaurant::factory()->count(10)->create();
        Item::factory()->count(20)->create();
    }
}
