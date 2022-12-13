<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name' => 'Vienna Pepito',
        'email' => 'viennapepito01@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('password123'),
        'remember_token' => null,
        ])->assignRole('writer', 'admin');
    }
}
