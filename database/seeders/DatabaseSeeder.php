<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        About::factory()->create([
            'title' => 'About Us',
            'desc' => "The CAG Group is one of the largest business group in Myanmar with a hard-earned reputation for excellent business practices and products' quality with its operational headquarters in the metropolis of Yangon, Myanmar, in South East Asia. CAG Group of Companies have done various projects in different industries with innovative solutions.",
            'image' => "https://images.pexels.com/photos/28450983/pexels-photo-28450983/free-photo-of-luxurious-workspace-with-coffee-and-laptop.jpeg?auto=compress&cs=tinysrgb&w=600"
        ]);
        
        Setting::factory()->create([
            'title' => 'CAG Myanmar',
            'sub-title' => 'Group of Companies',
        ]);
    }
}
