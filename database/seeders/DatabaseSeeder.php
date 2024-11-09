<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::create([
            'name' => 'Test User',
            'password' => Hash::make('password'),
            'email' => 'test@example.com',
        ]);

        \App\Models\Product::create([
            'user_id' => $user->id,
            'name' => "Product1"
        ]);
    }
}
